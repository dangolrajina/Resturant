<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Auth;
use App\Userprofile;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * @param Userprofile $Userprofile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = \DB::table('users')
                     ->join('orders', 'users.id', '=', 'orders.user_id')
                     ->get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($user)
    {
       if (Auth::user()->id == $user){
        return redirect('/admin/user/');
       }
      return view('admin.user.show')->with(['user' =>User::find($user),'roles' =>Role::all()]);
    }
    public function update(Request $request, $user)
    {
        if (Auth::user()->id == $user){
        return redirect('/admin/user');
       }
       $user = User::find($user);
       $user->roles()->sync($request->roles);
       return redirect('/admin/user');
    }
    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($user)
    {
    	$users = User::findOrFail($user);
        $users->delete();
        return redirect('/admin/userregister')->with('flash','Successfully deleted the user');
    }

    /**
     * @param $user
     * @return mixed
     */
    public function users($user)
    {
        $userprofiles = \DB::table('users')
            ->leftJoin('userprofiles', 'users.id', '=', 'userprofiles.users_id')
            ->where('users.id', $user)
            ->get();
        return $userprofiles;
    }

}