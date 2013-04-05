<?php

require_once(dirname(__FILE__) . "/../lib/xmlrpc-3.0.0.beta/xmlrpc.inc");

class AuthHelper extends XMLRPCHelper {

  public function isAuth() {

    // есть ли токен в куках
    //$authToken = Yii::app()->request->cookies['auth_backend'];    
    // взяла из кук проперми
    $authToken = 'ae451b90ddbb61144cce11852a6e2850';
    if (isset($authToken)) {

      // хватаем параметры для доступа к бэкенду  
      $authHost = Yii::app()->params['authData']['authHost'];
      $clientId = Yii::app()->params['authData']['clientId'];
      $clientSecret = Yii::app()->params['authData']['clientSecret'];

      if ($authHost && $clientId && $clientSecret) {

        // что скажет бэкенд?
        $res = @file_get_contents($authHost . '/auth/checkToken/?client_id=' . $clientId . '&client_secret=' . $clientSecret . '&token=' . $authToken);
        $res = json_decode($res);

        if ($res && $res->success) {
          Yii::trace('Good token! User name ' . $res->UserData->username);
          return $res->userData;

//          stdClass Object
//          (
//            [id] => 3097
//            [username] => dashkakorepashka
//            [name] => Р”Р°СЂСЊСЏ
//            [avatar] => http://img.properm.ru/img/avatar/3093.jpg
//            [photo] => http://properm.ru//UserFilesDisk/img/profile_image/3093-1303704972.jpg
//            [service] => properm
//            [serviceId] => 3093
//            [email] => arwi@yandex.ru
//            [gender] => F
//            [url] => http://properm.ru/user/3093/
//            [updated] => 2013-04-04 19:12:23
//            [birthday] => 1988-10-11
//          )
        } elseif ($res && $res->error) {
          Yii::trace('Bad token ' . $authToken);
          unset(Yii::app()->request->cookies['auth_backend']);
        }
      }
    }

    return false;
  }

}
