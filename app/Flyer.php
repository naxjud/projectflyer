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

  public static function LocatedAt($zip , $street){

    $street = str_replace('-',' ',$street);

    return static::where(compact('zip','street'))->first();
  }

  public function getPriceAttribute($price){

    return number_format($price).' €';

  }

  public function addPhoto(Photo $photo){

    return $this->photos()->save($photo);
    
  }
  /**
  * A Flyer is composed of many Photos
  *
  * @return
  **/

  public function photos(){
    return $this->hasMany('App\Photo');
  }
}
