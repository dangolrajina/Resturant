<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use Auth;
use Illuminate\Http\Request;

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
        return redirect('/admin/menu');


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

    public function order(Request $request)
    {
       
    }
}
