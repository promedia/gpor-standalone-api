<?php

/**
 * @author Darya Korepanova <d.korepanova@properm.ru>
 * @ticket APIPP-30
 */
class HeaderModel extends CModel {

  /**
   * Request page url 
   * @var string
   */
  public $pageUrl;

  /**
   * Header charset 
   * @var string
   */
  public $charset = 'utf-8';

  /**
   * Value for header tag <title>
   * @var string
   */
  public $title = 'Properm.ru';

  /**
   * Value for header meta-tag description
   * @var string 
   */
  public $description;

  /**
   * Value for header meta-tag keywords
   * @var string 
   */
  public $keywords;

  /**
   * Flag for legacy header
   * 1 for legacy, 0 for new
   * @var boolean 
   */
  public $legacy = 0;

  /**
   * Array of client's js urls
   * @var array
   */
  public $js = array();

  /**
   * Array of client's css urls
   * @var array 
   */
  public $css = array();

  /**
   * Name of content-block in header
   * @var string 
   */
  public $headerCB = 'common_banner_top';

  /**
   * Flag for search block
   * 1 - use search, 0 - no search
   * @var boolean 
   */
  public $search = 1;

  /**
   * Value for caption in header
   * @var string 
   */
  public $caption;

  /**
   * rediclare abstract function
   * 
   * @return array of class attributes names
   */
  public function attributeNames() {
    return array('pageUrl', 'charset', 'title', 'description', 'keywords', 'legacy', 'js', 'css', 'headerCB', 'search', 'caption');
  }

  /**
   * Set params
   * 
   */
  public function __construct() {

    $httpRequest = Yii::app()->getRequest();

    // set header params
    $this->setCharset($httpRequest->getQuery('charset'));
    $this->setMetaTags($httpRequest->getQuery('url'), $httpRequest->getQuery('title'), $httpRequest->getQuery('description'), $httpRequest->getQuery('keywords'));
    $this->setLegacy($httpRequest->getQuery('legacy'));
    $this->setCss($httpRequest->getQuery('css'));
    $this->setJs($httpRequest->getQuery('js'));
    $this->setSearch($httpRequest->getQuery('search'));
    $this->setHeaderCB($httpRequest->getQuery('header_cb'));
    $this->setCaption($httpRequest->getQuery('caption'));
  }

  /**
   * Set charset header param
   * 
   * @param string $charset utf-8 by default
   */
  protected function setCharset($charset = 'utf-8') {

    $this->charset = ($charset == 'windows-1251') ? $charset : 'utf-8';
  }

  /**
   * Set page url
   * Get meta-info (titles, keywords, description) from api by page url 
   * Set meta info from request or from api data
   * 
   * @param string $pageUrl from request
   * @param string $title from request
   * @param string $description from request
   * @param string $keywords from request
   */
  protected function setMetaTags($pageUrl = '', $title = '', $description = '', $keywords = '') {

    $this->setPageUrl($pageUrl);

    if (!empty($this->pageUrl)) {

      // getting list of api custom data (url, metatags, etc.)
      $arrCustomData = $this->getCustomUrlTitles();
    }

    // setting the title of section (page)
    if (!empty($title)) {

      // get title from request?
      $this->title = urldecode($this->title);

      if ($this->charset != Yii::app()->charset) {
        $this->title = iconv($this->charset, Yii::app()->charset, $this->title);
      }
    } elseif ($arrCustomData) {

      // get title from api by page url?
      $this->title = $arrCustomData[0]['title'];
    }


    // setting the keywords (SEO) of section (page)
    if (!empty($keywords)) {

      // get keywords from request?
      $this->keywords =urldecode($keywords);

      if ($this->charset != Yii::app()->charset) {
        $this->keywords = iconv($this->charset, Yii::app()->charset, $this->keywords);
      }
    } elseif ($arrCustomData) {

      // get keywords from api by page url?
      $seoKeywords = $arrCustomData[0]['keywords'];
    }

    // setting the description (SEO) of section (page)
    if (!empty($description)) {

      // get description from request?
      $this->description = urldecode($description);

      if ($this->charset != Yii::app()->charset) {
        $this->description = iconv($charset, Yii::app()->charset, $this->description);
      }
    } elseif ($arrCustomData) {
      // get description from api by page url?
      $this->description = $arrCustomData[0]['description'];
    }
  }

  /**
   * Set requested page url
   * 
   * @param string $pageUrl
   */
  protected function setPageUrl($pageUrl = '') {

    // clear page url     
    $pageUrl = urldecode($pageUrl);

    // deleting WWW from Url and adding slashes in the beggining and in the end of Url
    $pageUrl = preg_replace('/www./', '', $pageUrl);
    if (substr($pageUrl, -1) != '/') {
      $pageUrl = $pageUrl . '/';
    }

    if (substr($pageUrl, 0, 1) != '/') {
      $pageUrl = '/' . $pageUrl;
    }

    if (empty($pageUrl)) {
      Yii::log('HeaderModel::setPageUrl BAD page url from request ' . $pageUrl, 'error');
    } else {
      $this->pageUrl = $pageUrl;
    }
  }

  /**
   * Return array of custom urls by page url
   * 
   * @return array 
   */
  protected function getCustomUrlTitles() {

    $resArray = array();

    // if is set page url trying to get it titles from api or cahce
    if (!empty($this->pageUrl)) {

      // cache hash
      $cacheKey = md5($this->pageUrl);

      $cachedData = Yii::app()->cache->get($cacheKey . '_listCustomUrlTitles');

      // if isset cache return it
      if ($cachedData) {
        $resArray = $cachedData;
      } else {

        try {

          // getting list of api custom data (url, metatags, etc.)
          $apiCustomData = XMLRPCHelper::sendMessage('admin.listCustomUrlTitles');

          // filtering the data by value of url
          if (is_array($apiCustomData) && count($apiCustomData) > 0) {

            foreach (array_keys($apiCustomData) as $key) {
              $temp[$key] = $apiCustomData[$key]['url'];

              // deleting WWW from Url and adding slashes in the beggining and in the end of Url
              $temp[$key] = preg_replace('/www./', '', $temp[$key]);

              // adding slash in the end of Url if not exist
              if (substr($temp[$key], -1) != '/') {
                $temp[$key] = $temp[$key] . '/';
              }

              // adding slash in the beggining of Url if not exist
              if (substr($temp[$key], 0, 1) != '/') {
                $temp[$key] = '/' . $temp[$key];
              }

              if ($temp[$key] == $this->pageUrl) {
                $resArray[] = $apiCustomData[$key];
              }
            }
          }

          // set cahce
          $cahcePeriod = isset(Yii::app()->params['cachingPeriod']['listCustomUrlTitles']) ? Yii::app()->params['cachingPeriod']['listCustomUrlTitles'] : 24 * 60 * 60;
          Yii::app()->cache->set($cacheKey . '_listCustomUrlTitles', $resArray, $cahcePeriod);
        } catch (Exception $e) {
          Yii::log('HeaderModel::getCustomUrlHeaders ' . $e->getMessage(), 'error');
        }
      }
    }
    return $resArray;
  }

  /**
   * Set array of client's css urls
   * 
   * @param string $css 
   */
  protected function setCss($css = '') {

    if (!empty($css)) {
      $this->css = explode(',', $css);
    }
  }

  /**
   * Set array of client's js urls
   * 
   * @param string $js 
   */
  protected function setJs($js = '') {

    if (!empty($js)) {
      $this->css = explode(',', $js);
    }
  }

  /**
   * Set legacy flag for header
   * 
   * @param boolean $legacy 0 by default (new)
   */
  protected function setLegacy($legacy = 0) {

    $this->legacy = $legacy ? 1 : 0;
  }

  /**
   * Set search flag for header
   * 
   * @param boolean $search 0 by default (no search block)
   */
  protected function setHeaderCB($headerCB = '') {

    if (!empty($headerCB)) {
      $this->headerCB = $headerCB;
    }
  }

  /**
   * Set search flag for header
   * 
   * @param boolean $search 0 by default (no search block)
   */
  protected function setSearch($search = 0) {

    $this->search = $search ? 1 : 0;
  }

  /**
   * Set caption for header
   * 
   * @param boolean $search 0 by default (no search block)
   */
  protected function setCaption($caption = '') {

    if (!empty($caption)) {
      $this->caption = urldecode($caption);

      if ($this->charset != Yii::app()->charset)
        $this->caption = iconv($this->charset, Yii::app()->charset, $caption);
    }
  }

}

?>
