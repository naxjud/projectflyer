<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{

    /**
    * fillable fields for a Flyer
    *
    */
    protected $table='flyers';

    protected $fillable=[
        'street',
        'city',
        'zip',
        'state',
        'country',
        'price',
        'description'
    ];

    public static function LocatedAt($zip , $street)
    {

        $street = str_replace('-',' ',$street);

        return static::where(compact('zip','street'))->firstOrFail();
    }

    public function getPriceAttribute($price)
    {

        return number_format($price).' €';

    }

    public function addPhoto(Photo $photo)
    {

        return $this->photos()->save($photo);

    }


    public function owner()
    {
        return $this->belongsTo('App\User','user_id');
    }


    public function ownedBy(User $user){

        return $this->user_id == $user->id;
        
    }
    /**
    * A Flyer is composed of many Photos
    *
    * @return
    **/

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
