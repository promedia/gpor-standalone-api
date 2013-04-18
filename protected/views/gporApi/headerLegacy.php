<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="ru">
  <head>


    <meta http-equiv="Content-Type" content="text/html; charset=<?= $charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">

    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/img/icon.ico" type="image/x-icon" rel="shortcut icon" />
    <link rel="apple-touch-icon" href="<?= Yii::app()->request->getBaseUrl(true) ?>/img/apple_touch_icon.png" />

    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/old_main.css" rel=stylesheet type="text/css">
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/old_main_v3.css" rel=stylesheet type="text/css">
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/style__new.css" rel=stylesheet type="text/css">
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/old_style.css" rel=stylesheet type="text/css">


    <!--[if lte IE 6]>
    <style type="text/css" media="all">
    /**
     * @package 66-v5-css
     */
  
    /**
     * @section head
     */
  
    /**
     * @subsection weather
     */
  
    /**
     * @workaround ie6 transparent png support
     * @affected ie6
     * @css-for ie6
     * @valid no
     */
    #v5-head div.v5-weather-p {
        background: none;
    }
  
    /**
     * @workaround ie6 rendering bug
     * @affected ie6
     * @css-for ie6
     * @valid yes
     */
    #v5-head div.v5-weather-br {
        left: -5px !important;
    }
  
    /**
     * @subsection login
     */
  
    /**
     * @workaround ie6 transparent png support
     * @affected ie6
     * @css-for ie6
     * @valid no
     */
    #v5-head div.v5-login-p {
        background: none;
    }
  
    /**
     * @workaround ie6 rendering bug
     * @affected ie6
     * @css-for ie6
     * @valid yes
     */
    #v5-head div.v5-login-br {
        left: -5px !important;
    }
  
    /**
     * @subsection elements
     */
  
    /**
     * @workaround ie6 transparent png support
     * @affected ie6
     * @css-for ie6
     * @valid no
     */
    div.v5-grayblock-p {
        background: none;
    }
  
    div.it-is-for-you {
        background: none;
    }
    </style>
    <![endif]-->

    <script type="text/javascript" src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/jquery-1.3.2-pack.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/jquery.autocomplete-pack.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/jquery.hotkeys-pack.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/jquery.mousewheel-pack.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/jquery.autoresize.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/jquery.color.js"></script>


    <script type="text/javascript">
      (function($) {
        $(function() {
          $('#v5-head ul.v5-menu div.v5-submenu-wrap').parent().hover(
          function() { $(this).addClass('active'); },
          function() { $(this).removeClass('active'); }
        ).end().find('li.v5-submenu-item > a').add('li.v5-subsubmenu-item').hover(
          function() { $(this).addClass('active'); },
          function() { $(this).removeClass('active'); }
        );

          var $searchText = $('#v5-search-text');

          $searchText.blur(function() {
            if(!'кремлевская диета' || this.value.replace(/(^\s+|\s+$)/g, '')) return;
            $searchText.val('Например: кремлевская диета').addClass('blured');
          })
          .focus(function() {
            if(this.value.replace(/(^\s+|\s+$)/g, '') != 'Например: кремлевская диета') return;
            $searchText.val('').removeClass('blured');
          })
          .parents('form').submit(function() {
            if($.trim($searchText.val()) != 'Например: кремлевская диета')
              return;

            $searchText.val('кремлевская диета').removeClass('blured');
          }).attr('autocomplete', 'off');

          if(!$searchText.val() && 'кремлевская диета')
            $searchText.addClass('blured').val('Например: кремлевская диета');

          $.browser.msie && $.browser.version <= 6 ? LoadPng() : '';
        });

      })(jQuery);
    </script> 

    <?php
    //в наших проектах они не используются. По крайней мере пока не подключим авторизацию 
//    <script type="text/javascript" src="http://img.properm.ru/js/TransparentPng.js"></script>
//    <script type="text/javascript" src='http://img.properm.ru/js/ajax2.js'></script>
//    <script type="text/javascript" src='http://img.properm.ru/js/ax.js'></script>
//    <script type="text/javascript" src='http://img.properm.ru/js/main.js'></script>
//    <script type="text/javascript" src='http://img.properm.ru/js/new_calendar.js'></script>
//    <script type="text/javascript" src='http://img.properm.ru/js/new_66.js'></script>
//    <script type="text/javascript" src='http://img.properm.ru/js/window.js'></script>
//    <script type="text/javascript" src="http://img.properm.ru/js/scroller_v4_front.js"></script>
//    <script type="text/javascript" src="http://img.properm.ru/js/chat.js"></script>
//    <script type="text/javascript" src="http://img.properm.ru/js/CrySuggest.js"></script>
//    <script type="text/javascript" src='http://img.properm.ru/js/gifts.js'></script>
    ?>

    <title><?= $this->pageTitle ?></title>
    <script type="text/javascript">var debug = 0;</script>
  </head>
  <body>

    <!-- cbcb id122 --><!-- Kavanga.AdEngine START -->
    <!-- ѕро ѕермь и ѕермский край -->
    <!-- ZeroPixel -->
    <script language="JavaScript">
      <!--
      var kref = '';
      try {kref = escape(document.referrer);} catch(e){};
      var d = document, b = document.body;
      var img = d.createElement('IMG');
      with(img.style){position = 'absolute'; width = '0px'; height = '0px';}
      img.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'b.kavanga.ru/exp?sid=2904&bt=3&bn=1&ct=8&prr=' + kref + '&rnd=' + Math.round(Math.random()*1000000);
      b.insertBefore(img, b.firstChild);
      //-->
    </script>
    <noscript><img src="b.kavanga.ru/exp?sid=2904&bt=3&bn=1&ct=8" border=0 width=1 height=1></noscript>
    <!-- Kavanga.AdEngine END -->

    <? //КБ с растяжкой ?>
    <?php $this->widget('application.components.ContentBlockWidget', array('name' => $headerCB)); ?>

    <div id="window"></div>
    <div id="user_info" onmouseout="userinfo_hide()" onmouseover="clearTimeout(ui_t)"></div><div id="overlay"></div>
    <div id="v5-frame">
      <div id="v5-head-wrap" >
        <div id="v5-head">
          <div class="v5-logo">
            <a href="http://properm.ru/">


              <i><img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/9666e7a3.png" /></i>

            </a>
          </div>

          <?php if (!empty($caption) && empty($search)) { ?>
            <div class="global-header">
              — <a href="http://<?= $url ?>"> <?= $caption ?> </a> </div>

          <?php } ?>
          <?php //Блок поиска ?>
          <form action="http://properm.ru/search/" accept-charset="<?= $charset ?>" method="get" <?php if (!empty($search)) { ?>class="v5-search" style="margin-left: 270px;"<?php } else { ?> class="v5-search hidden" autocomplete="off" <?php } ?>>              <p><label for="v5-search-text">Поиск</label></p>
            <p>
              <input type="text" class="text"
                     name="searchString"
                     value=""
                     id="v5-search-text" />
              <input type="submit" class="submit" value="Найти">
            </p>
          </form>



          <?php
          //Блок валюты   
          Yii::beginProfile('CurrencyInformerWidget');
          $this->widget('application.components.CurrencyInformerLegacyWidget');
          Yii::endProfile('CurrencyInformerWidget');

          //Блок погоды         
          Yii::beginProfile('WeatherInformerWidget');
          $this->widget('application.components.WeatherInformerLegacyWidget');
          Yii::endProfile('WeatherInformerWidget');

          //Блок авторизации                   
          Yii::beginProfile('UserPanelWidget');
          $this->widget('application.components.UserPanelWidget', array('legacy' => 'Legacy', 'authUser' => $authUser));
          Yii::endProfile('UserPanelWidget');
          ?>


          <noindex>
            <?php
            // Блок меню
            Yii::beginProfile('MenuWidget');
            $this->widget('application.components.MenuWidget', array('legacy' => 'Legacy', 'authUser' => $authUser));
            Yii::endProfile('MenuWidget');
            ?>
          </noindex>    
        </div>
      </div>