<?php

/**
 * Widget of menu
 * 
 * @author d.korepanova, l.rusakova
 */
class MenuWidget extends CWidget {

    public $legacy = '';
    public $authUser = '';
    public $pageUrl = '';

    public function run() {

        // check user athorized?
        if ($this->authUser['response'] != 0) {
            $flag = 1;
        } else {
            $flag = 0;
        }

        // get cache
        $cacheKey = md5(serialize(array('type' => 'menu', 'flag' => $flag, 'url' => $this->pageUrl, 'legacy' => $this->legacy)));

        $widgetCache = Yii::app()->cache->get($cacheKey);

        // if isset cache return it
        if ($widgetCache) {
            echo $widgetCache;
        } else {
            try {
                // get rules for checked menu items from 66 api
                $arrRules = XMLRPCHelper::sendMessage('admin.listMenuCheckedRules');

                // get active item of menu
                foreach ($arrRules as $rule) {
                    $mask = addcslashes($rule['rule'], '/');
                    $mask = preg_replace('/\*/', '(.*)', $mask);

                    if (preg_match('/^' . $mask . '$/', $this->pageUrl)) {
                        $activeItemId = $rule['siteMenuItemId'];
                        break;
                    }
                }

                // get rules for checked menu items from 66 api
                $arrMenuData = XMLRPCHelper::sendMessage('admin.listMenu');

                if (is_array($arrMenuData)) {

                    $render = $this->render('MenuView' . $this->legacy, array('data' => $arrMenuData, 'activeItem' => $activeItemId, 'flag' => $flag), true);

                    // save cache
                    $cacheTime = !empty(Yii::app()->params['cachingPeriod']['menu']) ? Yii::app()->params['cachingPeriod']['menu'] : 24 * 60 * 60;
                    Yii::app()->cache->set($cacheKey, $render, $cacheTime);

                    echo $render;
                }
            } catch (Exception $e) {
                Yii::log('MenuWidget ' . $e->getMessage(), 'error');
            }
        }
    }

}

?>