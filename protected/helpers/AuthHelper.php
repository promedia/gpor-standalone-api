<?php

/**
 * Backend authorization helper
 * @author Korepanova
 */
require_once(dirname(__FILE__) . "/../lib/CurlHelper/CurlHelper.php");



class AuthHelper {

  /**
   * Check $authToken on auth backend host
   * @param string $authToken
   * @return json 
   */
  public static function checkAuthToken($authToken) {

    // return wrong session token by default
    $retValue = array('token' => '');

    try {

      // get backend auth params
      $authHost = Yii::app()->params['authData']['authHost'];
      $clientId = Yii::app()->params['authData']['clientId'];
      $clientSecret = Yii::app()->params['authData']['clientSecret'];

      // no auth data
      if (empty($authHost) || empty($clientId) || empty($clientSecret)) {
        $retValue = array('error' => 'no_auth_data');
        throw new Exception('AuthHelper::checkAuthToken(' . $authToken . ') no auth data');
      }

      // send authToken to authHost 
      $res = CurlHelper::getUrl($authHost . '/auth/checkAuthToken/?client_id=' . $clientId . '&client_secret=' . $clientSecret . '&auth_token=' . $authToken);
      $res = json_decode($res);

      // problems while getting response from authHost ?
      if (!$res) {
        $retValue = array('error' => 'no_data_from_auth_host');
        throw new Exception('AuthHelper::checkAuthToken(' . $authToken . ') no data returned from ' . $authHost);
      }

      // auth host returned error?
      if (isset($res->error)) {
        $retValue = array('token' => '');
        throw new Exception('AuthHelper::checkAuthToken(' . $authToken . ') bar result from ' . $authHost . ' Code: ' . $res->error->code . ' Message: ' . $res->error->message);
      }

      // no problems? let's return session token
      Yii::log('AuthHelper::checkAuthToken(' . $authToken . ') - good auth token. return session token ' . $res->token, 'trace');
      $retValue = array('token' => $res->token);
    } catch (Exception $e) {

      // log exception info
      Yii::log('File: ' . $e->getFile() . ' Line: ' . $e->getLine() . ' Message: ' . $e->getMessage(), 'error');
    }

    return json_encode($retValue);
  }

  /**
   * Check $sessionToken from clinet's session on auth backend host
   * @param string $sessionToken
   * @return json 
   */
  public static function checkSessionToken($sessionToken) {

    // return wrong session token by default
    $retValue = array('token' => '');

    try {

      // get backend auth params
      $authHost = Yii::app()->params['authData']['authHost'];
      $clientId = Yii::app()->params['authData']['clientId'];
      $clientSecret = Yii::app()->params['authData']['clientSecret'];

      // no auth data
      if (empty($authHost) || empty($clientId) || empty($clientSecret)) {
        $retValue = array('error' => 'no_auth_data');
        throw new Exception('AuthHelper::checkSessionToken(' . $sessionToken . ') no auth data');
      }

      // send sessionToken to authHost 
      $res = CurlHelper::getUrl($authHost . '/auth/checkToken/?client_id=' . $clientId . '&client_secret=' . $clientSecret . '&token=' . $sessionToken);
      $res = json_decode($res);

      // problems while getting response from authHost ?
      if (!$res) {
        $retValue = array('error' => 'no_data_from_auth_host');
        throw new Exception('AuthHelper::checkSessionToken(' . $sessionToken . ') no data returned from ' . $authHost);
      }

      // auth host returned error?
      if (isset($res->error)) {
        $retValue = array('token' => '');
        throw new Exception('AuthHelper::checkSessionToken(' . $sessionToken . ') bar result from ' . $authHost . ' Code: ' . $res->error->code . ' Message: ' . $res->error->message);
      }

      // no problems? let's return session token
      Yii::log('AuthHelper::checkSessionToken(' . $sessionToken . ') - good session token. User name ' . $res->userData->username, 'trace');
      $retValue = array('token' => $sessionToken);
    } catch (Exception $e) {

      // log exception info
      Yii::log('File: ' . $e->getFile() . ' Line: ' . $e->getLine() . ' Message: ' . $e->getMessage(), 'error');
    }
    return json_encode($retValue);
  }

  /**
   * Check user authorization
   * @return type
   */
  public static function isAuth() {

    // check token from request
    $sessionToken = Yii::app()->getRequest()->getQuery('session_token');

    // no token in user's session
    if (!isset($sessionToken)) {
      Yii::trace('AuthHelper::isAuth() no_backend_auth');
      return array('response' => 0, 'data' => 'no_backend_auth');
    }

    // we are still here! So, we have some session token. Let's check it on backend host
    $authHost = Yii::app()->params['authData']['authHost'];
    $clientId = Yii::app()->params['authData']['clientId'];
    $clientSecret = Yii::app()->params['authData']['clientSecret'];

    // Oops! We have no auth host params! 
    if (empty($authHost) || empty($clientId) || empty($clientSecret)) {
      Yii::trace('AuthHelper::isAuth(' . $sessionToken . ') Bad connection data from Yii::app()->params["authData"]');
      return array('response' => 0, 'data' => 'no_auth_data');
    }

    // Let's connect to auth host and check our session token
    $res = CurlHelper::getUrl($authHost . '/auth/checkToken/?client_id=' . $clientId . '&client_secret=' . $clientSecret . '&token=' . $sessionToken);
    $res = json_decode($res);

    if (!$res) {
      return array('response' => 0, 'data' => 'no_data_from_auth_host');
    }

    if ($res && $res->success) {

      Yii::trace('AuthHelper::isAuth(' . $sessionToken . ') Good session token. User name ' . $res->userData->username);
      return array('response' => $res->userData->id, 'data' => array('user' => $res->userData, 'token' => $sessionToken));
    } elseif ($res && $res->error) {

      Yii::trace('AuthHelper::isAuth(' . $sessionToken . ') Wrong session token');
      return array('response' => 0, 'data' => 'session_token_error');
    }
  }

}

