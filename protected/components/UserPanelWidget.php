<?php

/**
 * Widget of user Panel
 */
class UserPanelWidget extends CWidget {

  public $authUser = array();
  public $legacy = '';

  public function run() {
    
    // authorization backend host
    $authHost = Yii::app()->params['authData']['authHost'];
    $returnUrl = Yii::app()->getRequest()->getQuery('returnUrl');
    $redirectUrl = Yii::app()->getRequest()->getQuery('redirectUrl');
    
    // we can't make authorization without this params
    if ($authHost && $returnUrl && $redirectUrl) {
      if ($this->authUser['response']) {
        $view = 'AuthUserPanelView' . $this->legacy;
      } else {
        $view = 'UserPanelView' . $this->legacy;
      }
	  Yii::log( 'render ' . $view . ' for UserPanelWidget', 'trace');
      $this->render($view, array('data' => $this->authUser['data'], 'authHost' => $authHost, 'returnUrl' => $returnUrl, 'redirectUrl' => $redirectUrl));
    }
  }

}

?>
