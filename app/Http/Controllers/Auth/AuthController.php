<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Html;
use Input;
use Form;
use Auth;
use Response;
use Cookie;
use DB;
use Crypt;
use Illuminate\Http\Request;
use Redirect;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
  
    public function index () {
        return view('auth.login');
    }
  
    public function authenticate(Request $request) {
      $credentials_username_ad = array(
        'username' => Input::get('username'),
        'password' => Input::get('password'),
        'active' => 1,
        'userlevel' => '1');
      $credentials_email_ad = array(
        'email' => Input::get('username'),
        'password' => Input::get('password'),
        'active' => 1,
        'userlevel' => '1');
      $credentials_username_as = array(
        'username' => Input::get('username'),
        'password' => Input::get('password'),
        'active' => 1,
        'userlevel' => '3');
      $credentials_email_as = array(
        'email' => Input::get('username'),
        'password' => Input::get('password'),
        'active' => 1,
        'userlevel' => '3');
      
      

      // USER LEVEL 1
      if (Auth::attempt( $credentials_username_ad , true)) {
        $this->cookies();
        
        if($request->ajax()){
          return response('1');
        } else {
          return Redirect::to('/admin');
        }
      } elseif (Auth::attempt( $credentials_email_ad , true)) {
        $this->cookies();
        
        if($request->ajax()){
          return response('1');
        } else {
          return Redirect::to('/admin');
        }
        
      } elseif (Auth::attempt( $credentials_username_as , true)) {
        $this->cookies();
        
        if($request->ajax()){
          return response('3');
        } else {
          return Redirect::to('/home');
        }
        
      } elseif (Auth::attempt( $credentials_email_as , true)) {
        $this->cookies();
        
        if($request->ajax()){
          return response('3');
        } else {
          return Redirect::to('/home');
        }
        
      }
      else {
        if($request->ajax()){
          return response('invalid');
        }
        return Redirect::to('/login')->with('message', 'Incorrect Username or Password');
      }
    }
  
    function cookies() {
      $ckname = Auth::getRecallerName();
      Cookie::queue($ckname, Cookie::get($ckname), 99200);
    }
  
    public function registration (Request $request) {

      $files = array(
        'empno'      => Input::get('empno'),
        'username'   => Input::get('username'),
        'fullname'   => Input::get('fullname'),
        'email'      => Input::get('email'),
        'password'   => Input::get('password'),
        'password_confirmation' => Input::get('password_confirmation'),
        'gender'   => Input::get('gender'),
        'department'   => Input::get('department'),
        'position'   => Input::get('position'),
        'active'     => 0);

      $rules = [
        'empno'     => 'required|numeric|unique:users',
        'username'  => 'required|max:255',
        'fullname'  => 'required|max:255',
        'email'     => 'required|email|max:255|unique:users',
        'password'  => 'required|AlphaNum|min:6',
        'password_confirmation' => 'required|same:password',
        'gender'    => 'required',
        'department' => 'required',
        'position'  => 'required',
      ];

      $validator = Validator::make($files, $rules);
      if ( $validator->fails())
      {
        if($request->ajax()){
          return Response::json(
            $validator->messages()
          );
        }
        return Redirect::to('/register')->withInput()->withErrors($validator);
      }
      
      else {
        $resultid = DB::table('users')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($resultid as $id) {
          $result = $id->id;
        }
        $myId = $result + 1;
        $imgsrc = 'uploads/avatar.jpg';
        $empno = Input::get('empno');
        
        $user = new User;
        $user->keyenc = Crypt::encrypt($myId);
        $user->empno = $empno;
        $user->avatar = $imgsrc;
        $user->username = Input::get('username');
        $user->fullname = Input::get('fullname');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->gender = Input::get('gender');
        $user->department = Input::get('department');
        $user->position = Input::get('position');
        $user->userlevel = Input::get('userlevel');
        $user->userlevel = Input::get('position');
        $user->active = 0;
        $user->save();
        if($request->ajax()){
          return response('Register');
        }
        return Redirect::to('/register')->with('message', 'Wait for the Approval of the Admin of this Site');
      }
    }
  
    public function getPosition(Request $request) {
      $decode = $request->input('departmentid');
      $departmentid = Crypt::decrypt($decode);
      $position = DB::table('position')
        ->select('positionname', 'userlevel')
        ->where('departmentid', '=', $departmentid)
        ->get();
      return [
        'position' => $position
      ];
    }
    
    

}