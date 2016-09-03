<?php
namespace App\Services\Setting;
interface SettingServiceContract
{

  public function getCompanyName();

  public function updateOverall($requestData);

  public function getSetting();
}
