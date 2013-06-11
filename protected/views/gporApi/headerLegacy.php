<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="ru">
  <head>
   <?php
    // authorization backend host
    $authHost = Yii::app()->params['authData']['authHost'];
    $returnUrl = Yii::app()->getRequest()->getQuery('returnUrl');
    $redirectUrl = Yii::app()->getRequest()->getQuery('redirectUrl');

    // we can't make authorization without this params
    if ($authHost && $returnUrl && $redirectUrl) {
      if (!$authUser['response']) {
        ?>  
        <script type="text/javascript" charset="UTF-8" src="<?php echo $authHost; ?>/auth/checkIsAuth/?providers_set=properm,vk,lj,fb,tw,ya&amp;redirectUrl=<?php echo $redirectUrl; ?>&amp;returnUrl=<?php echo $returnUrl; ?>"></script>

        <!-- обработчик случая, если пользователь аутентифицирован на бекэнде. Должно стоять после загрузки скрипта, т.к. в нем определяется GporAuth -->
        <script type="text/javascript">
          GporAuth.run(function(token) {
            window.location.href = 'http://' + window.location.hostname + '/?auth_token=' + token + '&returnUrl=' + window.location;
            return;
          });
        </script>

        <?php
      }
    }
    ?> 
    <meta http-equiv="Content-Type" content="text/html; charset=<?= $charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">

    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/img/icon.ico" type="image/x-icon" rel="shortcut icon" />
    <link rel="apple-touch-icon" href="<?= Yii::app()->request->getBaseUrl(true) ?>/img/apple_touch_icon.png" />

    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/old_main.css" rel=stylesheet type="text/css">
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/old_main_v3.css" rel=stylesheet type="text/css">
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/old_style.css" rel=stylesheet type="text/css">
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/style__new.css" rel=stylesheet type="text/css">

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
      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://t.properm.ru/common/img/v5-white-frame.png', sizingMethod='crop');
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
      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://t.properm.ru/common/img/v5-lightgreen-frame.png', sizingMethod='crop');
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
      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://t.properm.ru/common/img/v5-gray-frame.png', sizingMethod='crop');
    }

    div.it-is-for-you {
      background: none;
      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://t.properm.ru/common/img/it-is-for-you.png', sizingMethod='crop');
    }
    </style>
    <![endif]-->

    <!--[if lt IE 8]>
    <style type="text/css">
    .v5-logo__descr {display: inline; position: relative; top: 16px;}
    .v5-logo__descr span {display: inline;}  
    .v5-logo__pic {float: left;}
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
                  function() {
                    $(this).addClass('active');
                  },
                  function() {
                    $(this).removeClass('active');
                  }
          ).end().find('li.v5-submenu-item > a').add('li.v5-subsubmenu-item').hover(
                  function() {
                    $(this).addClass('active');
                  },
                  function() {
                    $(this).removeClass('active');
                  }
          );

          var $searchText = $('#v5-search-text');

          $searchText.blur(function() {
            if (!'кремлевская диета' || this.value.replace(/(^\s+|\s+$)/g, ''))
              return;
            $searchText.val('Например: кремлевская диета').addClass('blured');
          })
                  .focus(function() {
            if (this.value.replace(/(^\s+|\s+$)/g, '') != 'Например: кремлевская диета')
              return;
            $searchText.val('').removeClass('blured');
          })
                  .parents('form').submit(function() {
            if ($.trim($searchText.val()) != 'Например: кремлевская диета')
              return;

            $searchText.val('кремлевская диета').removeClass('blured');
          }).attr('autocomplete', 'off');

          if (!$searchText.val() && 'кремлевская диета')
            $searchText.addClass('blured').val('Например: кремлевская диета');

          $.browser.msie && $.browser.version <= 6 ? LoadPng() : '';
        });

      })(jQuery);
    </script> 

   
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
      try {
        kref = escape(document.referrer);
      } catch (e) {
      }
      ;
      var d = document, b = document.body;
      var img = d.createElement('IMG');
      with (img.style) {
        position = 'absolute';
        width = '0px';
        height = '0px';
      }
      img.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'b.kavanga.ru/exp?sid=2904&bt=3&bn=1&ct=8&prr=' + kref + '&rnd=' + Math.round(Math.random() * 1000000);
      b.insertBefore(img, b.firstChild);
      //-->
    </script>
    <noscript><img src="b.kavanga.ru/exp?sid=2904&bt=3&bn=1&ct=8" border=0 width=1 height=1></noscript>
    <!-- Kavanga.AdEngine END -->

    <?php
    // Виджет контент-блока 
    $this->widget('application.components.ContentBlockWidget', array('name' => $headerCB));
    ?>

    <div id="window"></div>
    <div id="user_info" onmouseout="userinfo_hide()" onmouseover="clearTimeout(ui_t)"></div><div id="overlay"></div>
    <div id="v5-frame">
      <div id="v5-head-wrap" >
        <div id="v5-head">
          <div class="v5-logo">
            <a href="http://properm.ru/" class="v5-logo__pic" style="background-image: url('<?= Yii::app()->request->getBaseUrl(true) ?>/img/9666e7a3.png'); width: 219;">&nbsp;</a>
          </div>

          <?php if (!empty($caption) && empty($search)) { ?>
            <div class="global-header" style="left:229px;">
              — <a href="http://<?= $url ?>"> <?= $caption ?> </a> </div>

          <?php } ?>
          <?php // Блок поиска ?>
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
          // Виджет курсов валют  
          Yii::beginProfile('CurrencyInformerWidget');
          $this->widget('application.components.CurrencyInformerLegacyWidget');
          Yii::endProfile('CurrencyInformerWidget');

          // Виджет погоды         
          Yii::beginProfile('WeatherInformerWidget');
          $this->widget('application.components.WeatherInformerLegacyWidget');
          Yii::endProfile('WeatherInformerWidget');

          // Виджет авторизации                   
          Yii::beginProfile('UserPanelWidget');
          $this->widget('application.components.UserPanelWidget', array('legacy' => 'Legacy', 'authUser' => $authUser));
          Yii::endProfile('UserPanelWidget');
          ?>


          <noindex>
            <?php
            // Виджет меню
            Yii::beginProfile('MenuWidget');
            $this->widget('application.components.MenuWidget', array('legacy' => 'Legacy', 'authUser' => $authUser, 'pageUrl' => $url));
            Yii::endProfile('MenuWidget');
            ?>
          </noindex>    
        </div>
      </div>