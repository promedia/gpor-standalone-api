<?php

/**
 * @author Rusakova Lyudmila 
 * @since 1.0.0
 * @version 1.0.0
 * 
 * API-methods of header and footer getting controller
 *  
 */
class SiteController extends CController {

  /**
   * Экземпляр класса CHttpRequest - полученный запрос
   */
  protected $httpRequest = NULL;

  

  public function __construct($id) {

    $this->httpRequest = Yii::app()->getRequest();

    parent::__construct($id);
  }

  public function actionIndex() {
      $this->render('index');
  }
  
  /**
   * forms header
   */
  public function actionGetHeader() {
      $this->render('header');
  }

 
}