<?php

/**
 * Backend authorization helper
 * @author Korepanova
 */
require_once(dirname(__FILE__) . "/../lib/CurlHelper/CurlHelper.php");

class AuthHelper {

  protected static function getAuthConnectionParams() {

    // get backend auth params from configs
    $arrParams = Yii::app()->params['authData'];

    if (is_array($arrParams) && !empty($arrParams['authHost']) && !empty($arrParams['clientId']) && !empty($arrParams['clientSecret'])) {
      return $arrParams;
    } else {
      return array('error' => 'no_auth_data');
    }
  }

  /**
   * Check $authToken on auth backend host
   * @param string $authToken
   * @return json 
   */
  public static function checkAuthToken($authToken) {

    // return wrong session token by default
    $retValue = array('token' => '');

    try {

      $arrParams = self::getAuthConnectionParams();

      if (isset($arrParams['error'])) {
        $retValue = $arrParams;
        throw new Exception('AuthHelper::checkSessionToken(' . $sessionToken . ') no auth data');
      }

      // send authToken to authHost 
      try {
        $res = CurlHelper::getUrl($arrParams['authHost'] . '/auth/checkAuthToken/?client_id=' . $arrParams['clientId'] . '&client_secret=' . $arrParams['clientSecret'] . '&auth_token=' . $authToken);
        $res = json_decode($res);
      } catch (CurlException $ce) {
        // problems while getting response from authHost ?
        $retValue = array('error' => 'curl_exception');
        throw new Exception('AuthHelper::checkAuthToken(' . $authToken . ') curl exception while geting data from ' . $authHost);
      }

      // auth host returned error?
      if (isset($res->error)) {
        $retValue = array('token' => '');
        throw new Exception('AuthHelper::checkAuthToken(' . $authToken . ') bad result from ' . $authHost . ' Code: ' . $res->error->code . ' Message: ' . $res->error->message);
      }

      // no problems? let's return session token
      Yii::log('AuthHelper::checkAuthToken(' . $authToken . ') - good auth token. return session token ' . $res->token, 'trace');
      $retValue = array('token' => $res->token);
    } catch (CurlException $ce) {

      // problems while getting response from authHost ?
      $retValue = array('error' => 'curl_exception');
      // log exception info
      Yii::log('File: ' . $ce->getFile() . ' Line: ' . $ce->getLine() . ' Message: ' . $ce->getMessage(), 'error');
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

      $arrParams = self::getAuthConnectionParams();

      if (isset($arrParams['error'])) {
        $retValue = $arrParams;
        throw new Exception('AuthHelper::checkSessionToken(' . $sessionToken . ') no auth data');
      }

      // send sessionToken to authHost 
      $res = CurlHelper::getUrl($arrParams['authHost'] . '/auth/checkToken/?client_id=' . $arrParams['clientId'] . '&client_secret=' . $arrParams['clientSecret'] . '&token=' . $sessionToken);
      $res = json_decode($res);

      // auth host returned error?
      if (isset($res->error)) {
        $retValue = array('token' => '');
        throw new Exception('AuthHelper::checkSessionToken(' . $sessionToken . ') bad result from ' . $authHost . ' Code: ' . $res->error->code . ' Message: ' . $res->error->message);
      }

      // no problems? let's return session token
      Yii::log('AuthHelper::checkSessionToken(' . $sessionToken . ') - good session token. User name ' . $res->userData->username, 'trace');
      $retValue = array('token' => $sessionToken);
    } catch (CurlException $ce) {

      // problems while getting response from authHost ?
      $retValue = array('error' => 'curl_exception');
      // log exception info
      Yii::log('File: ' . $ce->getFile() . ' Line: ' . $ce->getLine() . ' Message: ' . $ce->getMessage(), 'error');
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

    try {
      // check token from request
      $sessionToken = Yii::app()->getRequest()->getQuery('session_token');

      // no token in user's session
      if (!isset($sessionToken)) {
        Yii::log('AuthHelper::isAuth() no_backend_auth', 'trace');
        return array('response' => 0, 'data' => 'no_backend_auth');
      }

      $arrParams = self::getAuthConnectionParams();

      if (isset($arrParams['error'])) {
        Yii::log('AuthHelper::isAuth(' . $sessionToken . ') Bad connection data from Yii::app()->params["authData"]', 'error');
        return array('response' => 0, 'data' => 'no_auth_data');
      }

      // Let's connect to auth host and check our session token
      $res = CurlHelper::getUrl($arrParams['authHost'] . '/auth/checkToken/?client_id=' . $arrParams['clientId'] . '&client_secret=' . $arrParams['clientSecret'] . '&token=' . $sessionToken);
      $res = json_decode($res);

      if ($res && $res->success) {

        Yii::log('AuthHelper::isAuth(' . $sessionToken . ') Good session token. User name ' . $res->userData->username, 'trace');
        return array('response' => $res->userData->id, 'data' => array('user' => $res->userData, 'token' => $sessionToken));
      } elseif ($res && $res->error) {

        Yii::log('AuthHelper::isAuth(' . $sessionToken . ') Wrong session token', 'error');
        return array('response' => 0, 'data' => 'session_token_error');
      }
    } catch (CurlException $ce) {

      // problems while getting response from authHost ?
      return array('response' => 0, 'data' => 'no_data_from_auth_host');
      // log exception info
      Yii::log('File: ' . $ce->getFile() . ' Line: ' . $ce->getLine() . ' Message: ' . $ce->getMessage(), 'error');
    }
  }

}

