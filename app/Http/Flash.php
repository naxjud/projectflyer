<?php
namespace App\Http;

class Flash{

  public function message($title, $message, $level, $key='flash_message'){
    session()->flash($key,[
      'title'   => $title,
      'message' => $message,
      'level'   => $level
    ]);
  }

  public function info($title, $message){
      return $this->message($title, $message, 'info');
  }

  public function success($title, $message){
      return $this->message($title, $message, 'success');
  }

  public function error($title, $message){
    return $this->message($title, $message, 'error');
  }

  public function overlay($title, $message, $level = 'success'){
    return $this->message($title, $message, $level,'flash_message_overlay');
  }
}
