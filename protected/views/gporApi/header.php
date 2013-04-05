<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">

  <head>

    <? //на другом конце url - оказался скрипт содержащий методы для проверки авторизован ли юзер и прочей ерунды. Нужно разобраться что к чему ?>
    <!--<script type="text/javascript">
      var url = "http://auth.properm.ru/auth/checkIsAuth/?providers_set=properm,vk,fb,tw,lj&redirectUrl=http%3A%2F%2Fproperm.ru%2Fnewgporlogin%2F&returnUrl=http%3A%2F%2Fproperm.ru%2Fnews%2F&rand=236466";
      url = url.replace("http%3A%2F%2Fproperm.ru%2Fnews%2F",encodeURIComponent(window.location));
      document.write('<scri' + 'pt type="text/javascript" src="' + url + '"></scri' + 'pt>');
    </script>
    <script type="text/javascript">
      GporAuth.run (function(token) {
        window.location.href = 'http://properm.ru/newgporlogin/?auth_token='+token+'&returnUrl='+window.location;
      });
    </script>-->



    <meta content="text/html; charset=<?= $charset ?>" http-equiv="Content-Type" />

    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/img/icon.ico" type="image/x-icon" rel="shortcut icon" />
    <link rel="apple-touch-icon" href="<?= Yii::app()->request->getBaseUrl(true) ?>/img/apple_touch_icon.png" />

    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/client.css" rel="stylesheet"  type="text/css" />
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/style.css" rel=stylesheet type="text/css" /> 

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/head.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/float.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/common.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/decorations.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/forms.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/b-popup-subscribe__popup.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/popup.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/b-popup-subscribe__buttons.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/buttons.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/b-popup-subscribe__popup.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/b-popup-subscribe__subscribe-content.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/b-popup-subscribe__buttons.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <title><?= $this->pageTitle ?></title>

    <script src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/client.js"  type="text/javascript"></script>
    <?php //стили и скрипт для поиска ?>
    <?php if (!empty($search)) { ?>
      <script type="text/javascript">
        (function($) {
          $(function() {
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
    <?php } ?>



    <?php //Хрен знает что такое ?>
    <!--<script language="JavaScript" type="text/javascript">
      if (self.parent.frames.length != 0)
        self.parent.location="http://properm.ru"
    </script>

    <script type="text/javascript">
      /* <![CDATA[ */
      $(document)
    <?php //Путь до кэша js, css & img в первом параметре был ?>
  .data('portal.resources', '<?= Yii::app()->request->getBaseUrl(true) ?>')
  .data('portal.user.id', '')
  .data('portal.user.uid', '')
  .data('portal.user.isInGlobalBan', '')
  .data('portal.user.loginUrl', '/user/userAjax/login/')
  .data('portal.user.registerUrl', '/user/userAjax/register/')
  .data('portal.user.registerCaptchaUrl', '/img/empty.gif')
  .data('portal.user.repairUrl', '/user/userAjax/restoreForgottenPassword/')
  .data('portal.user.infoUrl', '/user/userAjax/getUserInfo/')
  .data('portal.outerHostName', 'properm.ru');
  document.domain = 'properm.ru';

  var bannersource = '';
  /* ]]> */
    </script>-->

    <? //А этой картинки вообще нет на серваке. Убираю - ничего не изменяется. Когда создадим всю шапку-подвал, нужно проверить за что отвечают эти скрипты ?>
    <!--<style text="text/css">
      .head_menu-weather-status { background: url('http://properm.ru/st//2cb6206a5c755f558052c7818b60374ea6018df1/img/weather-icons.png') 0 0 no-repeat; }
    </style>-->
    <!--[if lte IE 6]>
        <style type="text/css">
            .head_menu-top .head_menu-top-left .head_menu-top-logo a { background: none; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?= Yii::app()->request->getBaseUrl(true) ?>/img/9666e7a3.png',sizingMethod='scale'); }
        </style>
    <![endif]-->
  </head>

  <body class=" page-fixed-right">
    <script type="text/javascript">
      /* <![CDATA[ */
      $(document).trigger('documentbodyloadstart');
      /* ]]> */
    </script>

    <!--[if IE 8]><div id="ie_frame_reflow"><![endif]-->
    <div id="opera_frame_reflow"></div>
    <!--[if IE 8]></div><![endif]-->

    <div id="frame" class="context">

      <!--[if IE]><div id="ie_all"><![endif]-->
      <!--[if lt IE 7]><div id="ie_lt-7"><![endif]-->
      <!--[if IE 7]><div id="ie_7"><![endif]-->
      <!--[if lt IE 8]><div id="ie_lt-8"><![endif]-->
      <!--[if IE 8]><div id="ie_8"><![endif]-->

      <!--[if IE 8]>
        <style>
           .out-head-wrap-content { 
              top : -6px;
            }   		
         </style>
      <![endif]-->
      <!--[if IE 8]>
         <style>
           .out-head-wrap-content { 
             top : -6px;
           }   		
         </style>
       <![endif]-->   

      <div id="out-head-wrap" >
        <div id="out-head-wrap-content" class="out-head-wrap-content">
          <?php
          //КБ с растяжкой 
          $this->widget('application.components.ContentBlockWidget', array('name' => $headerCB));
          ?>
        </div>
        
        <div id="head-wrap" class="ie_layout" >
          <!--[if lt IE 7]>
            <div class="ie_max-width_left_frame"></div>
            <div class="ie_max-width_right_frame"></div>
          <![endif]-->
          <div id="head" class="ie_layout">
            <div class="head_menu-top context">
              <div class="decorationHeaderPic "></div>
              <div class="head_menu-top-left context">
                <div class="head_menu-top-logo">
                  <a href="properm.ru/" style="background: url('<?= Yii::app()->request->getBaseUrl(true) ?>/img/9666e7a3.png') 0 50% no-repeat; width: 219px; height: 60px;">&nbsp;</a>
                </div>

                <?php if (!empty($search)) { ?>
                  <?php //блок поиска  ?>
                  <form action="http://properm.ru/search/" accept-charset="UTF-8" method="get" class="search_form_header" autocomplete="off">
                    <p><label for="v5-search-text">Поиск</label></p>
                    <p>
                      <input type="text" class="search_input_header blured" name="searchString" value="" id="v5-search-text" />
                      <input type="submit" class="search_submit_header" value="Найти" />
                    </p>

                  </form>
                <?php } elseif (!empty($caption)) { ?>
                  <?php //Название раздела  ?>
                  <div class="head_menu-top-section" style="left: 229px">
                    &nbsp;&mdash;&nbsp;<a style="top: 0;" href="http://<?= $url ?>"><?= $caption ?></a>
                  </div>
                <?php } ?>
              </div>
              <div class="head_menu-top-right context">
                <noindex>

                  <!--[if lte IE 8]>
                    <style type="text/css">
                      .head_menu-top .head_menu-top-weather { width: 220px; }
                    </style>
                  <![endif]-->
                  <?php
                  //Блок погоды                   
                  $this->widget('application.components.WeatherInformerWidget');

                  //Блок валюты                   
                  $this->widget('application.components.CurrencyInformerWidget');
                  
                  
                  ?>

                </noindex>
              </div>
            </div>

            <noindex>
              <?php
                // Блок меню
                $this->widget('application.components.MenuWidget', array('authUser' => $authUser)); 
                
                //Блок авторизации                   
                $this->widget('application.components.UserPanelWidget');
              ?>
            </noindex>

          </div>

        </div>
      </div>