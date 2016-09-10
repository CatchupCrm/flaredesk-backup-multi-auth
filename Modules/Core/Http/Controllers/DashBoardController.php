<?php
namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
  public function __construct()
  {
      dd(Auth::guard('staff')->user());
    $this->middleware('staff');
  }

  public function index()
  {
    return view('core::admin.admindashboard');
  }
}