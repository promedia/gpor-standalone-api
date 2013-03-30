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
        $pageUrl = Yii::app()->request->getQuery('url');

        // get cache
        $cacheKey = md5(serialize(array('type' => 'menu', 'authUser' => $this->authUser, 'url' => $pageUrl, 'legacy' => $this->legacy)));

        $widgetCache = Yii::app()->cache->get($cacheKey);

        // if isset cache return it
        if ($widgetCache) {

            echo $widgetCache;
        } else {

            $cacheTime = !empty(Yii::app()->params['cachingPeriod']['menu']) ? Yii::app()->params['cachingPeriod']['menu'] : 24 * 60 * 60;

            // get rules for checked menu items from 66 api
            $arrRules = XMLRPCHelper::sendMessage('admin.listMenuCheckedRules');

            // get active item of menu
            foreach ($arrRules as $rule) {
                $mask = addcslashes($rule['rule'], '/');
                $mask = preg_replace('/\*/', '(.*)', $mask);

                if (preg_match('/^' . $mask . '$/', $pageUrl)) {
                    $activeItemId = $rule['siteMenuItemId'];
                    break;
                }
            }

            // get rules for checked menu items from 66 api
            $arrMenuData = XMLRPCHelper::sendMessage('admin.listMenu');

            if (is_array($arrMenuData)) {

                $render = $this->render('MenuView' . $this->legacy, array('data' => $arrMenuData, 'activeItem' => $activeItemId), true);
				
				echo $render;

				// save cache
                Yii::app()->cache->set($cacheKey, $render, $cacheTime);
            }
        }
    }

}

?>