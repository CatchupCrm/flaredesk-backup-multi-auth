<?php
namespace App\Http\Middleware\Lead;

use Closure;
use App\Models\Settings;
use App\Models\Lead;

class CanLeadUpdateStatus
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $lead = Lead::findOrFail($request->id);
    $isAdmin = Auth()->user()->hasRole('administrator');
    $settings = Settings::all();
    if ($isAdmin) {
      return $next($request);
    }
    $settingscomplete = $settings[0]['lead_complete_allowed'];
    if ($settingscomplete == 1 && Auth()->user()->id == $lead->assigned_to_staff_id) {
      Session()->flash('flash_message_warning', 'Only assigned user are allowed to close lead.');
      return redirect()->back();
    }
    return $next($request);
  }
}
