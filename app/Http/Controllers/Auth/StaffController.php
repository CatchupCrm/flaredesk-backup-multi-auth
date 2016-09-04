<?php
/*namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

// requests
// classes
use Auth;
use Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Lang;
use Mail;*/
/**
 * ---------------------------------------------------
 * AuthController
 * ---------------------------------------------------
 * This controller handles the registration of new users, as well as the
 * authentication of existing users. By default, this controller uses
 * a simple trait to add these behaviors. Why don't you explore it?
 *
 * @author      Ladybird <info@ladybirdweb.com>
 */
/*class AuthController extends Controller
{*/
/**
 * Post of login page.
 *
 * @param type LoginRequest $request
 *
 * @return type Response
 */
/*  public function postLogin(LoginRequest $request)
  {

    // If session has login attempts, retrieve attempts counter and attempts time
    if (\Session::has('loginAttempts')) {
      $loginAttempts = \Session::get('loginAttempts');
      $loginAttemptTime = \Session::get('loginAttemptTime');
      // $credentials = $request->only('email', 'password');
      $usernameinput = $request->input('email');
      $password = $request->input('password');
      $field = filter_var($usernameinput, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
      // If attempts > 3 and time < 10 minutes
      if ($loginAttempts > 4 && (time() - $loginAttemptTime <= 600)) {
        return redirect()->back()->withErrors('email', 'incorrect email')->with('error', 'Maximum login attempts reached. Try again in a while');
      }
      // If time > 10 minutes, reset attempts counter and time in session
      if (time() - $loginAttemptTime > 600) {
        \Session::put('loginAttempts', 1);
        \Session::put('loginAttemptTime', time());
      }
    } else { // If no login attempts stored, init login attempts and time
      \Session::put('loginAttempts', $loginAttempts);
      \Session::put('loginAttemptTime', time());
    }


  }


}*/
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

  use AuthenticatesUsers;

  /* to redirect after login */
  // if auth is agent
  protected $redirectTo = '/dashboard';
  // if auth is user
  protected $redirectToUser = '/profile';
  /* Direct After Logout */
  protected $redirectAfterLogout = '/';
  protected $loginPath = '/login';

  /**
   * Create a new authentication controller instance.
   *
   * @param \Illuminate\Contracts\Auth\Guard $auth
   *
   * @return void
   */
  public function __construct(Guard $auth)
  {
    $this->auth = $auth;
    //AuthenticatesUsers::redirectPath insteadof RegistersUsers;
    $this->middleware('guest', ['except' => 'getLogout']);
  }

  /**
   * Show the application's login form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showLoginForm()
  {
    return view('auth.login');
  }


  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function postStaffLogin(Request $request)
  {
    // Set login attempts and login time
    //$loginAttempts = 1;
    //$usernameinput = $request->input('email');
    //$password = $request->input('password');
    //$field = filter_var($usernameinput, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
    // If auth ok, redirect to restricted area
    //\Session::put('loginAttempts', $loginAttempts + 1);

    // If the class is using the ThrottlesLogins trait, we can automatically throttle
    // the login attempts for this application. We'll key this by the username and
    // the IP address of the client making these requests into this application.
    if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
      $this->fireLockoutEvent($request);
      return $this->sendLockoutResponse($request);
    }

    $credentials = $this->credentials($request);

    /*
     *  This is the actual login check!
     **/
    if ($this->guard()->attempt($credentials, $request->has('remember'))) {
      if (Auth::user()->role == 'user') {
        return \Redirect::route('/');
      } else {
        return redirect()->intended($this->redirectPath());
      }
    }
    return redirect()->back()
      ->withInput($request->only('email', 'remember'))
      ->withErrors([
        'email' => $this->getFailedLoginMessage(),
        'password' => $this->getFailedLoginMessage(),
      ])->with('error', Lang::get('helpdesk::tickets.invalid'));
    // Increment login attempts
  }


  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function login(Request $request)
  {
    $this->validateLogin($request);
    // If the class is using the ThrottlesLogins trait, we can automatically throttle
    // the login attempts for this application. We'll key this by the username and
    // the IP address of the client making these requests into this application.
    if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
      $this->fireLockoutEvent($request);
      return $this->sendLockoutResponse($request);
    }
    $credentials = $this->credentials($request);
    if ($this->guard()->attempt($credentials, $request->has('remember'))) {
      return $this->sendLoginResponse($request);
    }
    // If the login attempt was unsuccessful we will increment the number of attempts
    // to login and redirect the user back to the login form. Of course, when this
    // user surpasses their maximum number of attempts they will get locked out.
    if (!$lockedOut) {
      $this->incrementLoginAttempts($request);
    }
    return $this->sendFailedLoginResponse($request);
  }


  /**
   * Get Failed login message.
   *
   * @return type string
   */
  protected function getFailedLoginMessage()
  {
    return 'This Field do not match our records.';
  }


}

