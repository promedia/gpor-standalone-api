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

    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/img/icon.ico" type="image/x-icon" rel="shortcut icon" />
    <link rel="apple-touch-icon" href="<?=Yii::app()->request->getBaseUrl(true)?>/img/apple_touch_icon.png" />

    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/client.css" rel="stylesheet"  type="text/css" />
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/style.css" rel=stylesheet type="text/css" /> 
    
    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/head.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/float.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/common.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/decorations.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/forms.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/b-popup-subscribe__popup.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/popup.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/b-popup-subscribe__buttons.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/buttons.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/b-popup-subscribe__popup.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/b-popup-subscribe__subscribe-content.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="<?=Yii::app()->request->getBaseUrl(true)?>/css/b-popup-subscribe__buttons.ie.if_lt_IE_8.css" rel="stylesheet"  type="text/css" />
    <![endif]-->
    
    <title><?= $this->pageTitle ?></title>

    <script src="<?=Yii::app()->request->getBaseUrl(true)?>/js/client.js"  type="text/javascript"></script>
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
  .data('portal.resources', '<?=Yii::app()->request->getBaseUrl(true)?>')
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
            .head_menu-top .head_menu-top-left .head_menu-top-logo a { background: none; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=Yii::app()->request->getBaseUrl(true)?>/img/9666e7a3.png',sizingMethod='scale'); }
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
          <? //КБ с растяжкой ?>
          <?php $this->widget('application.components.WidgetCB', array('name' => 'common_banner_top')); ?>
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
                  <a href="properm.ru/" style="background: url('<?=Yii::app()->request->getBaseUrl(true)?>/img/9666e7a3.png') 0 50% no-repeat; width: 219px; height: 60px;">&nbsp;</a>
                </div>
                
                <?php if (!empty($search)) { ?>
                <?php //блок поиска ?>
                <form action="http://properm.ru/search/" accept-charset="UTF-8" method="get" class="search_form_header" autocomplete="off">
                  <p><label for="v5-search-text">Поиск</label></p>
                  <p>
                    <input type="text" class="search_input_header blured" name="searchString" value="" id="v5-search-text" />
                    <input type="submit" class="search_submit_header" value="Найти" />
                  </p>

                </form>
                  <?php } elseif (!empty($caption)) { ?>
                <?php //Название раздела ?>
                <div class="head_menu-top-section" style="left: 229px">
                    &nbsp;&mdash;&nbsp;<a style="top: 0;" href="<?= $url ?>"><?= $caption ?></a>
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
                  <?php //Блок погоды 
                  
                  $this->widget('application.components.WeatherInformer');
                  ?>
                  <!--<div class="head_menu-top-weather context rc5">
                    <div class="head_menu-top-weather-left context">
                      <div class="head_menu-top-weather-left-degree">
                        -7
                      </div>

                      <div class="head_menu-top-weather-left-weather-status">
                        <table>
                          <tr><td style="vertical-align: middle;">пасмурно</td></tr>
                        </table>
                      </div>		

                      <div class="head_menu-top-weather-right-city">
                        <a href="http://properm.ru/weather/10/">погода в Перми</a>
                      </div>
                    </div>
                    <div class="head_menu-top-weather-right context ">
                      <div class="head_menu-top-weather-right-forecast">
                        <span>ночью: </span>
                        <span>-12 &deg;C</span>
                      </div>
                      <div class="head_menu-top-weather-right-forecast">
                        <span>завтра: </span>
                        <span>-7 &deg;C</span>
                      </div>
                      <div class="head_menu-top-weather-right-forecast">
                        <span>послезавтра: </span>
                        <span>-9 &deg;C</span>
                      </div>
                    </div>
                    <style type="text/css">
                      .head_menu-weather-status { background-position: 0 -129px; }
                    </style>

                    <div class="head_menu-weather-status">&nbsp;</div>

                  </div>-->
                  <? //Блок валюты ?>
                  <!--<div class="head_menu-top-currency">
                    <table>
                      <thead>
                        <tr>
                          <th class="head_menu-exchange-rates-th"><a class="head_menu-exchange-rates" href="http://newperm.gpor.ru/bank/currency/">курсы валют</a></th>
                          <th class="head_menu-today"><span class="head_menu-today">на сегодня</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="head_menu-exchange-rates-td">
                            <span class="head_menu-exchange-rates-sign">$</span>
                            <span class="head_menu-exchange-rates-content">30,1590</span>
                          </td>
                          <td class="head_menu-today-td">
                            <span class="head_menu-today-content">&nbsp;+0.0015</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="head_menu-exchange-rates-td">
                            <span class="head_menu-exchange-rates-sign head_menu-exchange-rates-sign-e">&euro;</span>
                            <span class="head_menu-exchange-rates-content">40,3618</span>
                          </td>
                          <td class="head_menu-today-td">
                            <span class="head_menu-today-content">&nbsp;&ndash;0.0553</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>-->
                </noindex>
              </div>
            </div>

            <noindex>
              <ul class="head_menu context">

                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/news/">
                    Новости
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/main/">Главные</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/society/">Общество</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/politic/">Политика</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/afisha/">Афиша</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/internet/">Интернет</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/business/">Бизнес</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/region/">Регион</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/auto/news/">Авто</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/sport/">Спорт</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/bank/news/">Банки и финансы</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/business/news/">Новости компаний</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/realty/news/">Недвижимость</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/incident/">Происшествия</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/world/">В мире</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/news/exclusive/">Эксклюзивно на Properm.ru</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/rabota/">
                    Работа
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/rabota/vacancy/">Поиск работы</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/rabota/resume/">Поиск сотрудников</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/rabota/newresume/">Добавить резюме</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://client.properm.ru/rabota/">Добавить вакансию</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/bank/">
                    Банки
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/bank/news/">Новости</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/bank/credit/">Кредиты</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/bank/hypothec/">Ипотека</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/bank/deposit/">Вклады</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/bank/bizcredit/">Юридическим лицам</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/bank/credit_order/">Заявка на кредит</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://spravka.properm.ru/">
                    Справка
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/citymap/">Карта дорог Перми</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://map.properm.ru/">Панорамы Перми</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/gurman/">Кафе, бары, рестораны</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://internet.properm.ru/">Интернет в Перми</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/hotels/">Гостиницы Перми</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/weather/10/">Погода в Перми</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/help/price/">Справочник товаров</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/auto/">
                    Авто
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/auto/news/">Новости</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/auto/test-drive/">Тест-драйвы</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/auto/catalog/">Каталог автомобилей</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/auto/doska/">Объявления</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/realty/">
                    Недвижимость
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/realty/news/">Новости</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/realty/objects/">Новостройки</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/realty/community/">Коттеджные поселки</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/realty/doska/live/">Объявления</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/realty/doska/live/add-adv/">Подать объявление</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/doska/">
                    Объявления
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/doska/">Доска объявлений</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/auto/doska/">Продажа автомобилей</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/doska/realty/">Недвижимость</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/realty/doska/com/">Коммерческая недвижимость</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/realty/doska/zagorod/">Загородная недвижимость</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/doska/my/">Мои объявления</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/doska/add-adv/">Подать объявление</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/gurman/">
                    Еда
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/gurman/house/">Рестораны и кафе</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/gurman/comments/">Отзывы</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/gurman/banket/">Заявка на банкет</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/afisha/">
                    Афиша
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/afisha/cinema/">Кино</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/afisha/event/">События</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/afisha/cinema/soon">Скоро в кино</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/afisha/cinema/place/">Кинотеатры Перми</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/talk/?bt=1&amp;amp;ct=1">
                    Общение
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/users/">Пользователи</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/club/">Клубы</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://love.properm.ru/">Знакомства</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <li class="head_menu_item">
                  <a class="head_menu_item_link" href="http://properm.ru/konkurs/">
                    Конкурсы
                  </a>


                </li>
                <li class="head_menu_item head_menu_item-has-submenu">
                  <a class="head_menu_item_link" href="http://properm.ru/photo/">
                    Фото
                        <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                  </a>

                  <ul class="head_submenu ie_layout">

                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/photo/fresh/">Новые фото</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/photo/mupload/">Загрузить фото</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/photo/favorite/">Избранные</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/photo/my/">Мои фото</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/video/">Видео</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/video/my/">Моё видео</a>


                    </li>
                    <li class="head_submenu_item ie_layout">

                      <a class="head_submenu_item_link ie_layout"
                         href="http://properm.ru/video/?upload">Загрузить видео</a>


                    </li>
                  </ul>

                  <!--[if lt IE 7]></td></tr></table></a><![endif]-->

                </li>
                <? //Плашка регистрации/залогиненого пользователя ?>
                <!--<li class="head_menu_item head_menu_item-begin rc3">
                  <span style="display: none; position: absolute;" id="host_for_login" class="properm.ru"></span>
                  <a class="head_menu_item-login inline-block gpor_auth" onclick="return false;" href="http://auth.properm.ru/?providers_set=properm,vk,fb,tw,lj&amp;redirectUrl=http%3A%2F%2Fproperm.ru%2Fnewgporlogin%2F&amp;returnUrl=http%3A%2F%2Fproperm.ru%2Fnews%2F&amp;rand=438983">Войти</a>
                  <span class="head_menu_item_label inline-block">с помощью:</span>
                  <a href="http://auth.properm.ru/?providers_set=properm,vk,fb,tw,lj&amp;redirectUrl=http%3A%2F%2Fproperm.ru%2Fnewgporlogin%2F&amp;returnUrl=http%3A%2F%2Fproperm.ru%2Fnews%2F&amp;rand=438983" provideruse="vk" class="gpor_auth" title="Вконтакте"><ins class="g-icons__middle-vk inline-block"></ins></a>
                  <a href="http://auth.properm.ru/?providers_set=properm,vk,fb,tw,lj&amp;redirectUrl=http%3A%2F%2Fproperm.ru%2Fnewgporlogin%2F&amp;returnUrl=http%3A%2F%2Fproperm.ru%2Fnews%2F&amp;rand=438983" provideruse="fb" class="gpor_auth" title="facebook"><ins class="g-icons__middle-fb inline-block"></ins></a>
                  <a href="http://auth.properm.ru/?providers_set=properm,vk,fb,tw,lj&amp;redirectUrl=http%3A%2F%2Fproperm.ru%2Fnewgporlogin%2F&amp;returnUrl=http%3A%2F%2Fproperm.ru%2Fnews%2F&amp;rand=438983" provideruse="tw" class="gpor_auth" title="twitter"><ins class="g-icons__middle-tw inline-block"></ins></a>
                  <a href="http://auth.properm.ru/?providers_set=properm,vk,fb,tw,lj&amp;redirectUrl=http%3A%2F%2Fproperm.ru%2Fnewgporlogin%2F&amp;returnUrl=http%3A%2F%2Fproperm.ru%2Fnews%2F&amp;rand=438983" provideruse="lj" class="gpor_auth" title="LiveJournal"><ins class="g-icons__middle-lj inline-block"></ins></a>
                  <script type="text/javascript">
                    try {
                      if ($.url().attr('anchor').length > 0) {
                        $('a.gpor_auth').each(function (i, e) {
                          var element = $(e);
                          var href = element.attr('href');
                          href = href.replace($.url(href).param('returnUrl'),encodeURIComponent(window.location));
                          element.attr('href', href);
                        });
                      }
                    }
                    catch (err) {}
                  </script>
                </li>-->

              </ul>
            </noindex>

          </div>

        </div>
      </div>