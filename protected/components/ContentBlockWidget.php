<?php

/**
 * Widget of content block
 * 
 * @author l.rusakova
 */
class ContentBlockWidget extends CWidget {

  public $name = '';

  public function run() {

    // cache hash
    $cacheKey = md5(serialize(array('name' => $this->name)));

    $cachedCB = Yii::app()->cache->get($cacheKey . '_CB');

    // if isset cache return it
    if ($cachedCB) {
      $this->render('ContentBlockView', array('CB' => $cachedCB));
    } else {

      try {
        // getting name and content of CB
        $CB = XMLRPCHelper::sendMessage('contextblock.get', $this->name);

        // set cahce
        if (!empty($CB)) {
          $cachingPeriod = !empty(Yii::app()->params['cachingPeriod']['CB'][$this->name]) ?
                  Yii::app()->params['cachingPeriod']['CB'][$this->name] : Yii::app()->params['cachingPeriod']['CB']['default'];

          Yii::app()->cache->set($cacheKey . '_CB', $CB, $cachingPeriod);

          $this->render('ContentBlockView', array('CB' => $CB));
        }
        
      } catch (Exception $e) {
        Yii::log('500 error trying to get CB '. $this->name, 'error');
      }
    }
  }

}

?>
