<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use LRedis;
use Auth;

class ChatController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function index()
  {
    $title = ucwords(Auth::user()->fullname . ' | Messages');
    return view('user.message', compact('title'));
  }
  
  public function writemessage()
  {
    return view('user.write');
  }
  
  public function sendMessage(){
    $redis = LRedis::connection();
    $redis->publish('message', Request::input('message'));
    return redirect('writemessage');
  }
  
}
