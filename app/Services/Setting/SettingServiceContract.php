<?php
namespace Modules\Core\Setting;
interface SettingServiceContract
{

  public function getCompanyName();

  public function updateOverall($requestData);

  public function getSetting();
}
