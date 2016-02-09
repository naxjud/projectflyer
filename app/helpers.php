<?php
/**
*  in this file helpers.php you can put all the functions you use in your
*  project so you can use them globally in laravel
*
*/
function flash($title =null, $message=null)
{
      $flash= app('App\Http\Flash');

      if(func_num_args()==0){
        return $flash;
      }

      return $flash->info($title, $message);
}
