<?php
namespace App\Http\Controllers;
use App\Admin;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }
      /**
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       */
      public function index()
      {
       
        return view('admin.admin');
      }
   
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // $this->authorize('update');
      return view('admin.auth.create');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $this->authorize('update');
     $this->validate(request(),[
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
      'role_id' => 'required'
    ]);
     $req = request(['name','email','password','role_id']);
     $req['password'] = bcrypt('password');
       // dd($req);
     $admin = Admin::create($req);
       // auth()->login($admin);
     return redirect('/admin/adminlist')->with('flash','New Admin User Has been Successfuly Created');
   }
    /**
     * @param Admin $admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Admin $admin)
    {
      // return $admin;
      // $admin_id = $admin->id;
      $adminss = $this->fetchadmin($admin);
      // $adminss =  Admin::find($admin_id)->profiles;
      // dd($adminss);s
      return view('admin.profile.view_profile',
        [
          'adminUser' => $admin,
          'relatiosss' => $adminss
        ]);
    }
    /**
     * @param Admin $admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Admin $admin)
    {
     $admins = $this->fetchadmin($admin);
     // dd($admins);
     return view('admin.profile.edit_admin',compact('admins'));
   }
   
  }