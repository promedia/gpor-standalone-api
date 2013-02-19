<?php

/**
 * Widget of content block
 * 
 * @author l.rusakova
 */
class WidgetCB extends CWidget {

  public $name = '';

  public function run() {

    // cache hash
    $cacheKey = md5(serialize(array('name' => $this->name)));

    $cachedCB = Yii::app()->cache->get($cacheKey . '_CB');

    // if isset cache return it
    if ($cachedCB) {
      $this->render('content_block', array('CB' => $cachedCB));
    } else {

      // getting name and content of CB
      $CB = XMLRPCHelper::sendMessage('contextblock.get', $this->name);

      // set cahce
      if (!empty($CB))
        Yii::app()->cache->set($cacheKey . '_CB', $CB, 24 * 60 * 60);

      $this->render('content_block', array('CB' => $CB));
    }
  }

}

?>
