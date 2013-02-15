<?php

/**
 * @author Rusakova Lyudmila 
 * @since 1.0.0
 * @version 1.0.0
 * 
 * API-methods of header and footer getting controller
 *  
 */

require_once Yii::app()->basePath . '/../lib/CurlHelper/CurlHelper.php';

class SiteController extends CController {

  /**
   * CHttpRequest - received request
   */
  protected $httpRequest = NULL;
  
  /**
   * Url
   * @var string 
   */
  protected $Url = '';
  
  /**
   * Title
   * @var string 
   */
  protected $Title = '';
  
  /**
   * Caption
   * @var string 
   */
  protected $Caption = '';
  
  /**
   * Charset
   * @var string 
   */
  protected $Charset = 'utf-8';
  
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
      throw new CHttpException(404,'Данная страница не существует');
  }
  
  public function actionError() {
    $this->render('error');
  }
  
  /**
     * Multi-demensional array filtering function
     * @var array 
     * @param array $array input array for filtering
     * @param string $index key(field) for filtering
     * @param $value value for filtering
     * @return filtered array
     * This filter will return only those items that match the $value given
     */
  private function filter_by_value ($array, $index, $value){ 
        if(is_array($array) && count($array)>0)  
        { 
            foreach(array_keys($array) as $key){ 
                $temp[$key] = $array[$key][$index]; 
                 
                if ($temp[$key] == $value){ 
                    $newarray[$key] = $array[$key]; 
                } 
            } 
          } 
      return $newarray; 
    } 
    
    
  /** Function of header forming
   * 
   */
  public function actionGetHeader() {
    
    $this->httpRequest = Yii::app()->getRequest();
    
    // getting list of api custom data (url, metatags, etc.)
    $data = XMLRPCHelper::sendMessage('admin.listCustomUrlTitles');
    
    // setting the url of section (page)
    if ($this->httpRequest->getQuery('url')) {
      $this->Url = strip_tags($this->httpRequest->getQuery('url'));
      
      // deleting WWW from Url and adding slashes in the beggining and in the end of Url
      $this->Url = preg_replace('/www./', '', $this->Url);
      
      if (substr($this->Url, -1) != '/') {
        $this->Url = $this->Url . '/';
      } 
      
      if (substr($this->Url, 0, 1) != '/') {
        $this->Url = '/' . $this->Url;
      }       
    }
    
    $data = $this->filter_by_value($data, 'url', $this->Url); 
   
    
    // setting the title of section (page)
    if ($this->httpRequest->getQuery('title')) {
      $this->Title = strip_tags($this->httpRequest->getQuery('title'));
    } elseif ($data) {
      $this->Title = strip_tags($data[0]['title']);
    }
    
    // setting the caption of section (page)
    if ($this->httpRequest->getQuery('caption')) {
      $this->Caption = strip_tags($this->httpRequest->getQuery('caption'));
    }
    
    // setting the charset of section (page)
    if ($this->httpRequest->getQuery('charset')) {
      $this->Charset = strip_tags($this->httpRequest->getQuery('charset'));
    }
    
    // setting the keywords (SEO) of section (page)
    if ($this->httpRequest->getQuery('keywords')) {
      $this->Keywords = strip_tags($this->httpRequest->getQuery('keywords'));
    } elseif ($data) {
      $this->Keywords = strip_tags($data[0]['keywords']);
    }
    
    // setting the description (SEO) of section (page)
    if ($this->httpRequest->getQuery('description')) {
      $this->Description = strip_tags($this->httpRequest->getQuery('description'));
    } elseif ($data) {
      $this->Description = strip_tags($data[0]['description']);
    }
    
    // setting the style-files of section (page)
    if ($this->httpRequest->getQuery('css')) {
      $this->CssUrl = strip_tags($this->httpRequest->getQuery('css'));
    }
    
    // setting the javascript-files of section (page)
    if ($this->httpRequest->getQuery('js')) {
      $this->JsUrl = strip_tags($this->httpRequest->getQuery('js'));
    }
    
    // setting the search-string of section (page)
    if ($this->httpRequest->getQuery('search')) {
      $this->Search = intval(strip_tags($this->httpRequest->getQuery('search')));
    }
    
      $this->render('header', array('title' => $this->Title, 
                                    'caption' => $this->Caption, 
                                    'charset' => $this->Charset, 
                                    'keywords' => $this->Keywords, 
                                    'description' => $this->Description, 
                                    'css' => $this->CssUrl, 
                                    'js' => $this->JsUrl, 
                                    'search' => $this->Search));
  }
}