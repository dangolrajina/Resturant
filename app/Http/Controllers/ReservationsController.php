<?php

namespace App\Http\Controllers;

use App\Reservations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationsController extends Controller
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
         //    $carbon = Carbon::now()->format('Y-m-d');
         // return Reservations::where('date',$carbon)->count();
        $reservations =\DB::table('reservations')
        ->join('users', 'users.id', '=', 'reservations.user_id')
        ->select('reservations.*', 'users.name')
        ->get(); 
        return view('admin.reservation.index',[
           'reservations' =>  $reservations
       ]);
    }
    public function viewReservation()
    {
        
        return view('reservations.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) 
    {
        $searchTerm = $request->input('searchTerm');
        $posts = Post::all()
        ->search($searchTerm);
        return view('posts.index', compact('posts', 'searchTerm'));
    }

    public function show($id)
    {
     $post = Post::find($id);
     return view('posts.show', compact('post'));

    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = request()->validate([
               'phone_number' => 'required',
               'total_ppl' => 'required',
               'date' => 'required',
               'time' => 'required',
               'description' => 'required'
        ]);
        $carbon = Carbon::now()->format('Y-m-d');
        $reservation = Reservations::where('date',$carbon)->count();
        if($reservation > 5){
            return redirect('/')->with('flash','Sorry, table are unavailable at this moment...');
        }else{
            Reservations::create([
                'user_id' => auth()->id(),
               'phone_number' => request('phone_number'),
               'total_ppl' => request('total_ppl'),
               'date' => request('date'),
               'time' => request('time'),
               'description' => request('description')
            ]);
            
        }
        return redirect('/')->with('flash_message_success','Table Bokked Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservations $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservations $reservations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservations $reservations)
    {
        //
    }
}

