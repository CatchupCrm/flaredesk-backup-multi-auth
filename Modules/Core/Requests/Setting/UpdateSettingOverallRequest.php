<?php
namespace Modules\Core\Http\Requests\Setting;

use App\Http\Requests\Request;

class UpdateSettingOverallRequest extends Request
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return auth()->user()->hasRole('administrator');
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'ticket_complete_allowed' => 'required',
      'ticket_assign_allowed' => 'required',
      'lead_complete_allowed' => 'required',
      'lead_assign_allowed' => 'required'
    ];
  }
}
