<?php

/**
 * Widget of user Panel
 */
class UserPanelWidget extends CWidget {

  public $userData = array();
  public $legacy = '';

  public function run() {

    // user data ?
    $this->userData = AuthHelper::isAuth();
    if ($this->userData) {
      // get cache
      $cacheKey = md5(serialize(array('type' => 'user_pane', 'user' => $this->userData['serviceId'])));
      $view = 'AuthUserPanelView' . $this->legacy;
    } else {
      // get cache
      $cacheKey = md5(serialize(array('type' => 'user_pane', 'user' => 0)));
      $view = 'UserPanelView' . $this->legacy;
    }

    $widgetCache = Yii::app()->cache->get($cacheKey);

    if ($widgetCache) {
      $cacheTime = !empty(Yii::app()->params['cachingPeriod']['currencyInformer']) ? Yii::app()->params['cachingPeriod']['currencyInformer'] : 60 * 60;

      $this->render($view, array('user' => $widgetCache));
    } else {

      $this->render($view, array('user' => $this->userData));
    }
  }

}

?>
