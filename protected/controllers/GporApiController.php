<?php

/**
 * @author Rusakova Lyudmila 
 * @since 1.0.0
 * @version 1.0.0
 * 
 * API-methods of header and footer getting controller
 *  
 */
class GporApiController extends CController {

    /**
     * Object of CHttpRequest class
     * @var object 
     */
    protected $httpRequest;

    public function actionIndex() {
        throw new CHttpException(404, '404 Error');
    }

    /**
     * log error
     */
    public function actionError() {

        Yii::log(Yii::app()->errorHandler->error['trace'], 'error');
    }

    /**
     * to check for correct token
     * 
     * @param type $action
     * @return boolean
     * @throws CHttpException
     */
    protected function beforeAction($action) {
        //except index and error actions
        $actionId = $this->getAction()->getId();
        if ($actionId == 'error' || $actionId == 'index') {
            return true;
        }

        $this->httpRequest = Yii::app()->getRequest();

        // get token    
        if (!($externalToken = $this->httpRequest->getQuery('token'))) {
            throw new CHttpException(403, '403 Error');
        }

        foreach (Yii::app()->params->token as $internalToken) {
            if ($externalToken == $internalToken) {
                return true;
            }
        }

        throw new CHttpException(403, '403 Error');
    }

    /** Function of header forming
     * 
     */
    public function actionGetHeader() {

        Yii::beginProfile('actionGetHeader');

        // check user authorization
        Yii::beginProfile('AuthHelper::isAuth');
        $authUser = AuthHelper::isAuth();
        Yii::endProfile('AuthHelper::isAuth');

        // init header object
        Yii::beginProfile('initHeaderObject');
        $objHeader = new HeaderModel();
        Yii::endProfile('initHeaderObject');

        // set data
        Yii::beginProfile('renderData');

        $clientScript = Yii::app()->getClientScript();

        // set page title
        $this->pageTitle = $objHeader->title;

        // set keywords
        if (!empty($objHeader->keywords)) {
            $clientScript->registerMetaTag($objHeader->keywords, 'keywords');
        }

        // set description
        if (!empty($objHeader->description)) {
            $clientScript->registerMetaTag($objHeader->description, 'description');
        }

        // register client's css in header
        if (!empty($objHeader->css)) {

            if (is_array($objHeader->css)) {
                foreach ($objHeader->css as $key => $css) {
                    $clientScript->registerCssFile($css);
                }
            } else {
                $clientScript->registerCssFile($objHeader->css);
            }
        }

        // register client's js in header
        if (!empty($objHeader->js)) {

            if (is_array($objHeader->js)) {
                foreach ($objHeader->js as $key => $js) {
                    $clientScript->registerScriptFile($js);
                }
            } else {
                $clientScript->registerScriptFile($objHeader->js);
            }
        }

        // set view depending on requested legacy
        if ($objHeader->legacy) {
            $viewName = 'headerLegacy';
        } else {
            $viewName = 'header';
        }

        $render = $this->render($viewName, array(
            'charset' => $objHeader->charset,
            'headerCB' => $objHeader->headerCB,
            'search' => $objHeader->search,
            'caption' => $objHeader->caption,
            'url' => $this->httpRequest->getQuery('url'),
            'authUser' => $authUser,
                ), true);
        if ($objHeader->charset != Yii::app()->charset) {
            // 24-04-2013 Korepanova add //IGNORE  to avoiid FALSE result og iconv
            $render = iconv(Yii::app()->charset, $objHeader->charset . "//IGNORE", $render);
        }

        Yii::endProfile('renderData');

        echo $render;

        Yii::endProfile('actionGetHeader');
    }

    /**
     * Check auth token from client on auth host
     * If the request does not include a auth_token parameter, a CHttpException (error code 400) will be thrown automatically.
     * @param string $auth_token request param $_GET['auth_token']
     */
    public function actionCheckAuth($auth_token) {

        Yii::beginProfile('actionCheckAuth');

        $sessionToken = AuthHelper::checkAuthToken($auth_token);

        echo $sessionToken;

        Yii::endProfile('actionCheckAuth');
    }

    /**
     * Check session token from client on auth host
     * If the request does not include a session_token parameter, a CHttpException (error code 400) will be thrown automatically.
     * @param string $session_token request param $_GET['session_token']
     */
    public function actionCheckSessionToken($session_token) {

        Yii::beginProfile('actionCheckSessionToken');

        $authUser = AuthHelper::checkSessionToken($session_token);

        echo $authUser;

        Yii::endProfile('actionCheckSessionToken');
    }

    /** Function of footer forming
     * 
     */
    public function actionGetFooter() {

        Yii::beginProfile('actionGetFooter');

        // init header object
        Yii::beginProfile('initFooterObject');
        $objFooter = new FooterModel();
        Yii::endProfile('initFooterObject');

        // set data
        Yii::beginProfile('renderFooterData');

        // set view depending on requested legacy
        if ($objFooter->legacy) {
            $viewName = 'footerLegacy';
        } else {
            $viewName = 'footer';
        }

        $render = $this->render($viewName, array(
            'footerCB' => $objFooter->footerCB,
                ), true);

        Yii::endProfile('renderFooterData');

        if ($objFooter->charset != Yii::app()->charset) {
            $render = iconv(Yii::app()->charset, $objFooter->charset . "//IGNORE", $render);
        }
        
        echo $render;

        Yii::endProfile('actionGetFooter');
    }

}