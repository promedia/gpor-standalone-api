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

  public function actionError() {
    $error = Yii::app()->errorHandler->error;

    $this->render('error', array('error' => $error));
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

    // check user authorization
    $authUser = AuthHelper::isAuth();
   
    // cache hash
    $cacheKey = md5($this->httpRequest->getRequestUri());

    $cachedHeader = Yii::app()->cache->get($cacheKey . '_header_' . $authUser['response']);

    // if isset cache return it
    if ($cachedHeader) {
      echo $cachedHeader;
    } else {

      // setting the url of section (page)
      if (!($url = $this->httpRequest->getQuery('url'))) {
        throw new CHttpException(500, '500 Error');
      }

      $url = strip_tags(urldecode($url));

      // deleting WWW from Url and adding slashes in the beggining and in the end of Url
      $url = preg_replace('/www./', '', $url);

      if (substr($url, -1) != '/') {
        $url = $url . '/';
      }

      if (substr($url, 0, 1) != '/') {
        $url = '/' . $url;
      }

      if (!empty($url)) {

        // getting list of api custom data (url, metatags, etc.)
        $apiCustomData = XMLRPCHelper::sendMessage('admin.listCustomUrlTitles');

        // filtering the data by value of url
        $filter = new ArrayFilter();
        $apiCustomData = $filter->filter_by_value($apiCustomData, 'url', $url);
      }

      // setting the charset of section (page)
      if ($charset = $this->httpRequest->getQuery('charset')) {
        $charset = strip_tags($charset);

        //correct charset name
        if (($charset != 'utf-8') && ($charset != 'windows-1251')) {
          throw new CHttpException(500, '500 Error');
        }
      } else {
        $charset = Yii::app()->charset;
      }


      // setting the title of section (page)
      if ($this->pageTitle = $this->httpRequest->getQuery('title')) {
        $this->pageTitle = strip_tags(urldecode($this->pageTitle));
        if ($charset != Yii::app()->charset)
          $this->pageTitle = iconv($charset, Yii::app()->charset, $this->pageTitle);
      } elseif ($apiCustomData) {
        $this->pageTitle = strip_tags($apiCustomData[0]['title']);
      } else {
        $this->pageTitle = 'Properm.ru';
      }

      // setting the caption of section (page)
      if ($caption = $this->httpRequest->getQuery('caption')) {
        $caption = strip_tags(urldecode($caption));
        if ($charset != Yii::app()->charset)
          $caption = iconv($charset, Yii::app()->charset, $caption);
      }

      // setting the keywords (SEO) of section (page)
      if ($seoKeywords = $this->httpRequest->getQuery('keywords')) {
        $seoKeywords = strip_tags(urldecode($seoKeywords));
        if ($charset != Yii::app()->charset)
          $seoKeywords = iconv($charset, Yii::app()->charset, $seoKeywords);
      } elseif ($apiCustomData) {
        $seoKeywords = strip_tags($apiCustomData[0]['keywords']);
      }

      // setting the description (SEO) of section (page)
      if ($seoDescription = $this->httpRequest->getQuery('description')) {
        $seoDescription = strip_tags(urldecode($seoDescription));
        if ($charset != Yii::app()->charset)
          $seoDescription = iconv($charset, Yii::app()->charset, $seoDescription);
      } elseif ($apiCustomData) {
        $seoDescription = strip_tags($apiCustomData[0]['description']);
      }

      // setting the style-files of section (page)
      if ($cssUrl = $this->httpRequest->getQuery('css')) {
        $cssUrl = strip_tags($cssUrl);
      }

      // setting the javascript-files of section (page)
      if ($jsUrl = $this->httpRequest->getQuery('js')) {
        $jsUrl = strip_tags($jsUrl);
      }

      // setting the search-string of section (page)
      if ($searchBlock = $this->httpRequest->getQuery('search')) {
        $searchBlock = intval(strip_tags($searchBlock));
      }

      // setting the keywords in the header 
      if (!empty($seoKeywords)) {
        Yii::app()->clientScript->registerMetaTag($seoKeywords, 'keywords');
      }

      // setting the description in the header
      if (!empty($seoDescription)) {
        Yii::app()->clientScript->registerMetaTag($seoDescription, 'description');
      }

      // setting the url of style(css) files in the header
      if (!empty($cssUrl)) {
        $CssFiles = explode(',', $cssUrl);

        if (is_array($CssFiles)) {
          foreach ($CssFiles as $key => $css) {
            Yii::app()->getClientScript()->registerCssFile($css);
          }
        } else {
          Yii::app()->getClientScript()->registerCssFile($csUrl);
        }
      }

      // setting the url of javascript files in the header
      if (!empty($jsUrl)) {
        $JsScripts = explode(',', $jsUrl);

        if (is_array($JsScripts)) {
          foreach ($JsScripts as $key => $js) {
            Yii::app()->getClientScript()->registerScriptFile($js);
          }
        } else {
          Yii::app()->getClientScript()->registerScriptFile($jsUrl);
        }
      }

      // what ContentBlock for header we want?
      $headerCB = $this->httpRequest->getQuery('header_cb') ? $this->httpRequest->getQuery('header_cb') : 'common_banner_top';

      // old header?
      if ($this->httpRequest->getQuery('legacy')) {
        $viewName = 'header_old';
      } else {
        $viewName = 'header';
      }

      $render = $this->render($viewName, array('url' => $this->httpRequest->getQuery('url'),
          'caption' => $caption,
          'charset' => $charset,
          'search' => $searchBlock,
          'headerCB' => $headerCB,
          'authUser' => $authUser,
          'uri' => $this->httpRequest->getRequestUri()), true);

      if ($charset != Yii::app()->charset) {
        $render = iconv(Yii::app()->charset, $charset, $render);
      }

      echo $render;

      Yii::app()->cache->set($cacheKey . '_header', $render, Yii::app()->params['cachingPeriod']['header']);
    }
  }

  /** Function of header forming
   * 
   */
  public function actionCheckAuth() {

    $authToken = $this->httpRequest->getQuery('auth_token');

    if (!empty($authToken)) {

      $authUser = AuthHelper::checkAuthToken($authToken);

      if ($authUser) {
        echo $authUser;
      }
    }
  }

}