<?php
namespace App\Http\Controllers\AdminAuth;

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
  public $redirectTo = '/adminpanel';

  // if auth is user
  protected $redirectToUser = '/profile';
  /* Direct After Logout */
  protected $redirectAfterLogout = '/';
  protected $loginPath = '/login';


  /**
   * Create a new controller instance.
   *
   * @return void
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
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
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


      /**
       * Get the user provider used by the guard.
       *
       * @return \Illuminate\Contracts\Auth\UserProvider
       */
      /*public function getProvider()
      {
        return $this->provider;
      }*/
      /**
       * Set the user provider used by the guard.
       *
       * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
       * @return void
       */
      /*public function setProvider(UserProvider $provider)
      {
        $this->provider = $provider;
      }*/
      /*
       * $this->guard()->setUser($this->lastAttempted);
        $this->provider->validateCredentials($user, $credentials);
       * $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);
       * $this->guard()->setUser($this->lastAttempted);
      if (Auth::attempt($loginData, true)) {
      return Redirect::intended('/');
      //Auth::getRecallerName()
      }
      **/
      /**
       * Return the currently cached user.
       *
       * @return \Illuminate\Contracts\Auth\Authenticatable|null
       */
      /*public function getUser()
      {
        return $this->user;
      }*/
      /**
       * Set the current user.
       *
       * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
       * @return void
       */
      /*public function setUser(AuthenticatableContract $user)
      {
        $this->user = $user;
        $this->loggedOut = false;
      }*/
      //$this->guard = SessionGuard
      //dd(Auth::guard('staff')->user());
      //$user = $this->guard('staff')->user();
      //Auth::guard($this->getGuard())->login();
      //dd($this->guard()->user()->name);
      // #loggedOut: false


      /*
       *  The Attempt will return true if valid login! do some magic for admin role!
       **/
      $staff = new \Modules\Core\Models\Staff;
      Auth::guard('staff')->setUser($staff);
      Auth::guard('staff')->lastAttempted = $staff;
      $user = Auth::guard('staff')->user();
      $this->username = $user->name;
      $this->role =$user->userRole->role->name;

      //Auth = AuthManager
      ////dd('do magic');

      return redirect()->intended($this->redirectPath());
      //return $this->sendLoginResponse($request);
    }

    // If the login attempt was unsuccessful we will increment the number of attempts
    // to login and redirect the user back to the login form. Of course, when this
    // user surpasses their maximum number of attempts they will get locked out.
    if (! $lockedOut) {
      $this->incrementLoginAttempts($request);
    }

    return $this->sendFailedLoginResponse($request);
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
