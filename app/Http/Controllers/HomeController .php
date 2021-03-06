<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Category;
use App\Menu;
use App\Order;
use Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('view','about');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($category = null)
    
    {

        $menus = $this->getCategory($category);
        return view('welcome',compact('menus'));

    }

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('layouts.aboutus');
    }

    public function menu($category = null)
    {
        $categories = Category::all();
        $menus = $this->getCategory($category);
        return view('menu.menu',compact('categories','menus'));
    }

   

    // public function viewcart()
    // {
    //     $orders = Order::latest()->get();
    //     return view('cart.cart',compact('orders'));
    // }

    // public function cart(Request $request)
    // {
    //     $orders = Order::create([
    //         'user_name' => Auth::user()->name,
    //         'user_email' => Auth::user()->email,
    //         'menu_name' => request('menu_name'),
    //         'quantity' => request('quantity'),
    //         'price' => request('price'),
    //         'created_at' => Carbon::now()->toDateTimeString()
    //     ]);
    //     return redirect('/cartview');
    // }

    public function getCategory($category = null)
    {
        if ($category) {
            $categoryId = Category::where('slug',$category)->first()->id; //1
            $menus = Menu::where('category_id',1)->latest()->get();
        }else{
            $menus = Menu::latest()->get();
        }
        return $menus;
    }
    
}