<?php

require_once(dirname(__FILE__) . "/../lib/xmlrpc-3.0.0.beta/xmlrpc.inc");

class AuthHelper extends XMLRPCHelper {

  public function checkAuthToken($authToken) {

    // хватаем параметры для доступа к бэкенду  
    $authHost = Yii::app()->params['authData']['authHost'];
    $clientId = Yii::app()->params['authData']['clientId'];
    $clientSecret = Yii::app()->params['authData']['clientSecret'];

    if ($authHost && $clientId && $clientSecret) {

      $res = @file_get_contents($authHost . '/auth/checkAuthToken/?client_id=' . $clientId . '&client_secret=' . $clientSecret . '&auth_token=' . $authToken);
      $res = json_decode($res);

      if ($res && !$res->error) {

        Yii::trace('AuthHelper::checkAuthToken(' . $authToken . ') - goodd auth token. return session token ' . $res->token);
        return $res->token;
      } else {
        Yii::trace('AuthHelper::checkAuthToken(' . $authToken . ') - bad auth token');
        return false;
      }
    } else {

      Yii::trace('AuthHelper::isAuth(' . $sessionToken . ') - bad connection data from Yii::app()->params["authData"]');
      return false;
    }
  }

  public function isAuth() {

    $sessionToken = Yii::app()->getRequest()->getQuery('session_token');

    if (!isset($sessionToken)) {
      Yii::trace('AuthHelper::isAuth() no_backend_auth');
      return array('response' => 0, 'data' => 'no_backend_auth');
    }

    if ($sessionToken == 'notoken') {
      Yii::trace('AuthHelper::isAuth() user is authorized but problems with session token');
      return array('response' => 0, 'data' => 'session_token_error');
    }

    // хватаем параметры для доступа к бэкенду  
    $authHost = Yii::app()->params['authData']['authHost'];
    $clientId = Yii::app()->params['authData']['clientId'];
    $clientSecret = Yii::app()->params['authData']['clientSecret'];

    if ($authHost && $clientId && $clientSecret) {

      // что скажет бэкенд?
      $res = @file_get_contents($authHost . '/auth/checkToken/?client_id=' . $clientId . '&client_secret=' . $clientSecret . '&token=' . $sessionToken);
      $res = json_decode($res);

      if ($res && $res->success) {

        Yii::trace('AuthHelper::isAuth(' . $sessionToken . ') Good session token. User name ' . $res->userData->username);
        return array('response' => $res->userData->id, 'data' => array('user' => $res->userData, 'token' => $sessionToken));
      } elseif ($res && $res->error) {

        Yii::trace('AuthHelper::isAuth(' . $sessionToken . ') Wrong session token');
        unset($_SESSION['token']);
        return array('response' => 0, 'data' => 'session_token_error');
      }
    } else {

      Yii::trace('AuthHelper::isAuth(' . $sessionToken . ') Bad connection data from Yii::app()->params["authData"]');
      return array('response' => 0, 'data' => 'Bad auth data');
    }
  }

}
