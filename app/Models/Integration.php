<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Dinero;

class Integration extends Model
{
  protected $fillable = ['name', 'relation_id', 'relation_secret', 'api_key', 'org_id', 'api_type'];

  /**
   * Get the api class name
   *
   * @param  [string] $type [description]
   * @return [type]       [description]
   */
  public static function getApi($type)
  {
    $integration = Integration::where([
      //'user_id' => $userId,
      'api_type' => $type
    ])->get();
    if ($integration) {
      $apiConfig = $integration[0];
      $className = $apiConfig->name;
      call_user_func_array(['App\\' . $className, 'initialize'], [$apiConfig]);
      $apiInstance = call_user_func_array(['App\\' . $className, 'getInstance'], []);
      return $apiInstance;
    }
    throw new \Exception('The user has no integrated APIs');
  }
}
