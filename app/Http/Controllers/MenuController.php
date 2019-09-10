<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;
use App\DeliveryAddresses;
use App\Order;
use Auth;
use Session;
use DB;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $s = request()->input('s');
        
        if($s != ''){
            $menus = \DB::table('menus')
                        ->where('name','LIKE','%'.$s.'%')
                        ->get();
        }else{

            $menus = Menu::latest()->get();
        }
        return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if($request->hasFile('menu_image')){
        $filenameWithExt = $request->file('menu_image')->getClientOriginalName();
        // Get Just Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get Just ext
        $extension = $request->file('menu_image')->getClientOriginalExtension();
        // Filename To Store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Uplopad the image
        $path =$request->file('menu_image')->storeAs('public/menu_images', $fileNameToStore);
        
        }

        else{
            
            $fileNameToStore ='default.jpg';          
        
        }

        Menu::create([
            'name' => request('name'),
            'price' => request('price'),
            'category_id' => request('category_id'),
            'menu_image' => $fileNameToStore
        ]);
        return redirect('/admin/menu')->with('flash_message_success','Menu added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {

        if($request->hasFile('menu_image')){
          $filenameWithExt = $request->file('menu_image')->getClientOriginalName();
          // Get Just Filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get Just ext
          $extension = $request->file('menu_image')->getClientOriginalExtension();
          // Filename To Store
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          // Uplopad the image
          $path =$request->file('menu_image')->storeAs('public/menu_images', $fileNameToStore);
          
          }

          else{
              
              $fileNameToStore ='default.jpg';          
          
          }
      $menu->update([
            'name' => request('name'),
            'price' => request('price'),
            'category_id' => request('category_id'),
            'menu_image' => $fileNameToStore
      ]);
       return redirect('/admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
         return redirect('/admin/menu');
    }

    public function addtoorder(Request $request)
    {
        $data = $request->all();
       if(empty(Auth::User()->email)){
            $data['user_email']='';
        }else{
            $data['user_email'] = Auth::User()->email;
        }

        $session_id = Session::get('session_id');
        if(!isset($session_id)){
            $session_id = str_random(20);
            Session::put('session_id', $session_id);
        }
        DB::table('cart')->insert(['name'=>$data['name'],'price'=>$data['price'],'quantity'=>$data['quantity'],'session_id'=>$session_id]);

        return redirect('cart')->with('flash_message_success','Products added to cart!');

    }

    public function cart()
    {
        $session_id = Session::get('session_id');
        $usercart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        foreach($usercart as $key => $product){
            $productDetails = DB::table('cart')->where('id',$product->id)->first();
            // $usercart[$key]->image = $productDetails->image;
        }
            return view('cart.cart')->with(compact('usercart'));
    }

    public function updateCartQuantity($id=null, $quantity=null)
    {
        $cart = DB::table('cart')->where('id', $id)->first();
        echo $updatecart = $cart->quantity+$quantity;
        if($updatecart >= $quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return redirect('cart');
        }
        else{
            DB::table('cart')->where('id',$id)->decrement('quantity',$quantity);
            return redirect('cart');
        }

    }
    public function deletecartproduct($id=null){
        DB::table('cart')->where('id',$id)->delete();
         return redirect('cart');

    }

    public function checkout(Request $request){

        $user_id = Auth::User()->id;
        $user_email = Auth::User()->email;
        $userDetails = User::find($user_id);

        $session_id = Session::get('session_id');
        DB::table('cart')->where('session_id',$session_id)->update(['user_email'=>$user_email]);

        if($request->isMethod('post')){
            $data = $request->all();

             $address = new DeliveryAddresses;
             $address->user_id = $user_id;
             $address->user_email = $user_email;
             $address->name = $data['billing_name'];
             $address->address = $data['billing_address'];
             $address->city = $data['billing_city'];
             $address->phone = $data['billing_mobile'];
             $address->save();

             return redirect()->action('MenuController@orderReview');
        }

        return view('cart.checkout',compact('userDetails'));
    }

    public function orderReview(Request $request){

        $user_id = Auth::User()->id;
        $user_email = Auth::User()->email;
        $userCart = User::where('id',$user_id)->first();

        $userCart = DB::table('cart')->where('user_email', $user_email)->get();
        foreach ($userCart as $key => $food) {
            $foodDetails = Menu::where('id',$food->name)->get();
        }

        return view('cart.order-review',compact('userCart'));
    }

    public function placeOrder(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user_id = Auth::User()->id;
            $user_email = Auth::User()->email;

            $addressDetail = DeliveryAddresses::where(['user_email'=>$user_email])->first();

            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->user_email = $user_email;
            $order->name = $addressDetail->name;
            $order->address = $addressDetail->address;
            $order->city = $addressDetail->city;
            $order->phone = $addressDetail->phone;
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();


            if($data['payment_method']=="COD"){
                $productdetails = Order::get();
                $productdetails = json_decode(json_encode($productdetails),true);
                // echo "<pre>"; print_r($productdetails); die;
                
                $userDetails = User::where('id',$user_id)->first();
                $userDetails = json_decode(json_encode($userDetails),true);
                // echo "<pre>"; print_r($userDetails); die;

                /* Code for Order Email Start */
               
                return redirect('/thanks');
            }

        }

    }

    public function thanks(){
        $user_email = Auth::User()->email;
        DB::table('cart')->where(['user_email'=>$user_email])->delete();
        return view('cart.thanks');
    }

    //ADmin order view//
    public function viewOrder()
    {
        $orders = Order::get();
        
        // echo "<pre>"; print_r($orders); die;
        return view('admin.order.order')->with(compact('orders'));
    }
}
