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
   * CHttpRequest - received request
   */
  protected $httpRequest = NULL;

  /**
   * Charset
   * @var string 
   */
  protected $Charset = 'utf-8';

  /**
   * Url
   * @var string 
   */
  protected $Url = '';

  /**
   * Caption
   * @var string 
   */
  protected $Caption = '';

  /**
   * Keywords (SEO)
   * @var string 
   */
  protected $Keywords = '';

  /**
   * Description (SEO)
   * @var string 
   */
  protected $Description = '';

  /**
   * Style files
   * @var string 
   */
  protected $CssUrl = '';

  /**
   * Javascript files
   * @var string 
   */
  protected $JsUrl = '';

  /**
   * Search string
   * @var integer 
   */
  protected $Search = 0;

  public function __construct($id) {

    parent::__construct($id);
  }

  public function actionIndex() {
    throw new CHttpException(404, '404 Error');
  }

  public function actionError() {
    $error = Yii::app()->errorHandler->error;

    $this->render('error', array('error' => $error));
  }

  /** Function of header forming
   * 
   */
  public function actionGetHeader() {

    $this->httpRequest = Yii::app()->getRequest();

    // setting the url of section (page)
    if (!($this->Url = $this->httpRequest->getQuery('url'))) {
      throw new CHttpException(500, '500 Error');
    }

    $this->Url = strip_tags(urldecode($this->Url));

    // deleting WWW from Url and adding slashes in the beggining and in the end of Url
    $this->Url = preg_replace('/www./', '', $this->Url);

    if (substr($this->Url, -1) != '/') {
      $this->Url = $this->Url . '/';
    }

    if (substr($this->Url, 0, 1) != '/') {
      $this->Url = '/' . $this->Url;
    }

    if (!empty($this->Url)) {

      // getting list of api custom data (url, metatags, etc.)
      $data = XMLRPCHelper::sendMessage('admin.listCustomUrlTitles');

      // filtering the data by value of url
      $filter = new ArrayFilter();
      $data = $filter->filter_by_value($data, 'url', $this->Url);
    }

    // setting the charset of section (page)
    if ($this->Charset = $this->httpRequest->getQuery('charset')) {
      $this->Charset = strip_tags($this->Charset);
    }


    // setting the title of section (page)
    if ($this->pageTitle = $this->httpRequest->getQuery('title')) {
      $this->pageTitle = strip_tags(urldecode($this->pageTitle));
      if ($this->Charset != 'utf-8')
        $this->pageTitle = iconv($this->Charset, 'utf-8', $this->pageTitle);
    } elseif ($data) {
      $this->pageTitle = strip_tags($data[0]['title']);
    } else {
      $this->pageTitle = 'Properm.ru';
    }

    // setting the caption of section (page)
    if ($this->Caption = $this->httpRequest->getQuery('caption')) {
      $this->Caption = strip_tags(urldecode($this->Caption));
      if ($this->Charset != 'utf-8')
        $this->Caption = iconv($this->Charset, 'utf-8', $this->Caption);
    }

    // setting the keywords (SEO) of section (page)
    if ($this->Keywords = $this->httpRequest->getQuery('keywords')) {
      $this->Keywords = strip_tags(urldecode($this->Keywords));
      if ($this->Charset != 'utf-8')
        $this->Keywords = iconv($this->Charset, 'utf-8', $this->Keywords);
    } elseif ($data) {
      $this->Keywords = strip_tags($data[0]['keywords']);
    }

    // setting the description (SEO) of section (page)
    if ($this->Description = $this->httpRequest->getQuery('description')) {
      $this->Description = strip_tags(urldecode($this->Description));
      if ($this->Charset != 'utf-8')
        $this->Description = iconv($this->Charset, 'utf-8', $this->Description);
    } elseif ($data) {
      $this->Description = strip_tags($data[0]['description']);
    }

    // setting the style-files of section (page)
    if ($this->CssUrl = $this->httpRequest->getQuery('css')) {
      $this->CssUrl = strip_tags($this->CssUrl);
    }

    // setting the javascript-files of section (page)
    if ($this->JsUrl = $this->httpRequest->getQuery('js')) {
      $this->JsUrl = strip_tags($this->JsUrl);
    }

    // setting the search-string of section (page)
    if ($this->Search = $this->httpRequest->getQuery('search')) {
      $this->Search = intval(strip_tags($this->Search));
    }


    // setting the keywords in the header 
    if (!empty($this->Keywords)) {
      Yii::app()->clientScript->registerMetaTag($this->Keywords, 'keywords');
    }

    // setting the description in the header
    if (!empty($this->Description)) {
      Yii::app()->clientScript->registerMetaTag($this->Description, 'description');
    }

    // setting the url of style(css) files in the header
    if (!empty($this->CssUrl)) {
      $CssFiles = explode(',', $this->CssUrl);

      if (is_array($CssFiles)) {
        foreach ($CssFiles as $key => $css) {
          Yii::app()->getClientScript()->registerCssFile($css);
        }
      } else {
        Yii::app()->getClientScript()->registerCssFile($this->CsssUrl);
      }
    }

    // setting the url of javascript files in the header
    if (!empty($this->JsUrl)) {
      $JsScripts = explode(',', $this->JsUrl);

      if (is_array($JsScripts)) {
        foreach ($JsScripts as $key => $js) {
          Yii::app()->getClientScript()->registerScriptFile($js);
        }
      } else {
        Yii::app()->getClientScript()->registerScriptFile($this->JsUrl);
      }
    }


    $render = $this->render('header', array('url' => $this->Url,
        'caption' => $this->Caption,
        'charset' => $this->Charset,
        'search' => $this->Search), true);

    if ($this->Charset != 'utf-8') {
      echo iconv('utf-8', $this->Charset, $render);
    } else {
      echo $render;
    }
  }

}