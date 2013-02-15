<?php

/**
 * Widget of content block
 * 
 * @author l.rusakova
 */

class WidgetCB extends CWidget {

  public $name = '';
  
  public function run() {

    // getting name and content of CB
    $CB = XMLRPCHelper::sendMessage('contextblock.get', $this->name);
    
    $this->render('content_block', array('CB' => $CB));
  }
}

?>
