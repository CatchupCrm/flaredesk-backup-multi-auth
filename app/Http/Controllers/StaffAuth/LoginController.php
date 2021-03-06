<?php
namespace App\Http\Controllers\StaffAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */
  use AuthenticatesUsers;

  /**
   * Where to redirect users after login / registration.
   *
   * @var string
   */
  public $redirectTo = '/staffpanel';

  // if auth is user
  protected $redirectToUser = '/profile';
  /* Direct After Logout */
  protected $redirectAfterLogout = '/';
  protected $loginPath = '/login';

  /**
   * Create a new controller instance.
   */
  public function __construct(Guard $auth)
  {
    $this->auth = $auth;
    $this->middleware('guest', ['except' => 'logout']);
  }

  /**
   * Log the user out of the application.
   *
   * @return Response
   */
  public function getLogout()
  {
    Auth::logout();
    //$this->auth->logout();
    return redirect('/guestindex');
  }

  /**
   * Show the application's login form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showLoginForm()
  {
    return view('staff.auth.login');
  }

  /**
   * Get the guard to be used during authentication.
   *
   * @return \Illuminate\Contracts\Auth\StatefulGuard
   */
  protected function guard()
  {
    return Auth::guard('staff');
  }
}
