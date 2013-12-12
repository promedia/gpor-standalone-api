<?php

/**
 * @author L.Rusakova
 * @ticket APIPP-2
 */
class FooterModel extends CModel {

    /**
     * Footer charset 
     * @var string
     */
    public $charset = 'utf-8';

    /**
     * Flag for legacy footer
     * 1 for legacy, 0 for new
     * @var boolean 
     */
    public $legacy = 0;

    /**
     * Name of content-block in footer
     * @var string 
     */
    public $footerCB = 'footer_menu_block';

    /**
     * rediclare abstract function
     * 
     * @return array of class attributes names
     */
    public function attributeNames() {
        return array('charset', 'legacy', 'footerCB');
    }

    /**
     * Set params
     * 
     */
    public function __construct() {

        $httpRequest = Yii::app()->getRequest();

        // set footer params
        $this->setCharset($httpRequest->getQuery('charset'));
        $this->setLegacy($httpRequest->getQuery('legacy'));
        $this->setFooterCB($httpRequest->getQuery('footer_cb'));
    }

    /**
     * Set charset footer param
     * 
     * @param string $charset utf-8 by default
     */
    protected function setCharset($charset = 'utf-8') {

        $this->charset = ($charset == 'windows-1251') ? $charset : 'utf-8';
    }

    /**
     * Set legacy flag for footer
     * 
     * @param boolean $legacy 0 by default (new)
     */
    protected function setLegacy($legacy = 0) {

        $this->legacy = $legacy ? 1 : 0;
    }

    /**
     * Set content-blocks for footer
     * 
     * @param string $cb
     */
    protected function setFooterCB($footerCB = '') {

        if (!empty($footerCB)) {
            $this->footerCB = $footerCB;
        }
    }

}

?>
