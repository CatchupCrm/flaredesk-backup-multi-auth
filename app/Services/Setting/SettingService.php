<?php
namespace Modules\Core\Setting;

use App\Models\Settings;

class SettingService implements SettingServiceContract
{

  public function getCompanyName()
  {
    return Settings::findOrFail(1)->company;
  }

  public function updateOverall($requestData)
  {
    $setting = Settings::findOrFail(1);
    $setting->fill($requestData->all())->save();
  }

  public function getSetting()
  {
    return Settings::findOrFail(1);
  }
}
