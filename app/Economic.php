<?php
namespace App;
class Economic
{
  protected $relation;
  protected static $relationId;
  protected static $accessToken;
  protected static $relationId;
  protected static $relationSecret;
  protected static $apiKey;


  protected function getClient()
  {
    if (!$this->relation) {
      $this->relation = new \GuzzleHttp\Client();
      $res = $this->relation->request('GET', 'https://restapi.e-conomic.com/customers', [
        'verify' => false,
        'headers' => [
          'X-AppSecretToken:' => 'demo',
          'X-AgreementGrantToken' => 'demo',
          'Content-Type' => 'application/json'
        ]
      ]);
      $response = self::convertJson($res);
      self::$accessToken = $response->access_token;
    }
    return $this->relation;
  }

  public static function getContacts()
  {
    $res = self::getClient()->request('GET', 'https://restapi.e-conomic.com/customers ');
    return json_decode($res->getBody(), true);
  }
}
