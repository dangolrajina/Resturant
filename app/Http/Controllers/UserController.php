<?php

namespace App\Http\Controllers;

use App\User;
use App\Userprofile;
class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
	{
		$this->middleware('auth:admin');
	}

    /**
     * @param Userprofile $Userprofile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Userprofile $Userprofile)
    {
        // $users = $this->fetchuser();
        $users = User::latest()->paginate(10);
        return view('admin.adminlists.userlists',compact('users'));
    }

    /**
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($user)
    {
        $userprofiles = $this->users($user);
        return $userprofiles;
        return view('admin.profile.user_profile',compact('userprofiles'));
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