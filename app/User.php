<?php

namespace App;

use Carbon\Carbon;
use App\Order;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	/**
	 * @var array
	 */
	protected $casts = [
        'confirmed' => 'boolean'
     ];
	
	/**
	 * @return string
	 */
	public function getRouteKeyName()
    {
        return 'name';
    }
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function reservation()
    {
        return $this->hasMany(Reservations::class,'user_id');
    }
	   /**
     * Mark the user's account as confirmed.
     */
    public function confirm()
    {
        $this->confirmed = true;
        $this->save();
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role'); 
    }

    public function hasAnyRoles($roles)
    {
          return !! $this->roles()->whereIn('name',$roles)->first();  
    }

    public function hasAnyRole($roles)
    {
        return !! $this->roles()->where('name',$roles)->first();  
    }

}


