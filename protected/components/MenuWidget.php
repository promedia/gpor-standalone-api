<?php

/**
 * Widget of menu
 * 
 * @author d.korepanova, l.rusakova
 */
class MenuWidget extends CWidget {

  public $legacy = '';
  public $authUser = '';
  public $activeItemId = 0;

  public function run() {

    // get page url
    $pageUri = Yii::app()->request->requestUri;
    preg_match('/url=(.+?)\&/', $pageUri, $matches);
    $pageUrl = $matches[1];

    // get rules for checked menu items from 66 api
    $arrRules = XMLRPCHelper::sendMessage('admin.listMenuCheckedRules');

    // get active item of menu
    foreach ($arrRules as $rule) {
      $mask = preg_replace('/\//', '', $rule['rule']);

      if (preg_match('/^' . $pageUrl . '/', $mask)) {
        $activeItemId = $rule['siteMenuItemId'];
        break;
      }
    }

    // get cache
    $cacheKey = md5(serialize(array('type' => 'menu', 'activeItem' => $activeItemId, 'authUser' => $this->authUser)));

    $widgetCache = Yii::app()->cache->get($cacheKey);

    // if isset cache return it
    if ($widgetCache) {

      $this->render('MenuView' . $this->legacy, array('data' => $widgetCache));
    } else {

      $cacheTime = !empty(Yii::app()->params['cachingPeriod']['menu']) ? Yii::app()->params['cachingPeriod']['menu'] : 24 * 60 * 60;

      // get rules for checked menu items from 66 api
      $arrMenuData = XMLRPCHelper::sendMessage('admin.listMenu');

      if (is_array($arrMenuData)) {

        // save cache
        Yii::app()->cache->set($cacheKey, $arrMenuData, $cacheTime);

        $this->render('MenuView' . $this->legacy, array('data' => $arrMenuData, 'activeItem' => $activeItemId));
      }
    }
  }

}

?>