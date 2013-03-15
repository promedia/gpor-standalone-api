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
  <body >




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
    <?php $this->widget('application.components.ContentBlockWidget', array('name' => 'common_banner_top')); ?>

    <div id="window"></div>
    <div id="user_info" onmouseout="userinfo_hide()" onmouseover="clearTimeout(ui_t)"></div><div id="overlay"></div>
    <div id="v5-frame">
      <div id="v5-head-wrap" >
        <div id="v5-head">
          <div class="v5-logo">
            <a href="http://properm.ru/">


              <i><img src="http://properm.ru/img/properm _header.png" /></i>

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
            $this->widget('application.components.CurrencyInformerWidget', array('legacy' => 'Legacy'));

            //Блок погоды                   
            $this->widget('application.components.WeatherInformerWidget', array('legacy' => 'Legacy'));
            ?>


            <noindex><ul class="v5-menu">

                <!--<li class="v5-menu-item">
                <a href="http://properm.ru/" 			>
                        Главная		</a>
                
                                
                        </li>-->
                <li class="v5-menu-item">
                  <a href="http://properm.ru/news/" 			>
                    Новости		</a>


                  <div class="v5-submenu-wrap">
                    <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                      <ul class="v5-submenu">
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/main/" 							>
                            Главные						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/society/" 							>
                            Общество						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/politic/" 							>
                            Политика						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/afisha/" 							>
                            Афиша						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/internet/" 							>
                            Интернет						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/business/" 							>
                            Бизнес						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/region/" 							>
                            Регион						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/auto/news/" 							>
                            Авто						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/sport/" 							>
                            Спорт						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/bank/news/" 							>
                            Банки и финансы						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/business/news/" 							>
                            Новости компаний						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/realty/news/" 							>
                            Недвижимость						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/incident/" 							>
                            Происшествия						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/news/authors/" 							>
                            Авторские колонки						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://video.properm.ru" 							>
                            Видеоновости						</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/rabota/" 			>
                    Работа		</a>


                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/bank/" 			>
                    Банки		</a>


                </li>
                <li class="v5-menu-item">
                  <a href="http://spravka.properm.ru/" 			>
                    Справка		</a>


                  <div class="v5-submenu-wrap">
                    <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                      <ul class="v5-submenu">
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/citymap/" 							>
                            Карта дорог Перми						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://map.properm.ru/" 							>
                            Панорамы Перми						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/gurman/" 							>
                            Кафе, бары, рестораны						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://internet.properm.ru/" 							>
                            Интернет в Перми						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/hotels/" 							>
                            Гостиницы Перми						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/weather/10/" 							>
                            Погода в Перми						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/help/price/" 							>
                            Справочник товаров						</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/auto/" 			>
                    Авто		</a>


                  <div class="v5-submenu-wrap">
                    <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                      <ul class="v5-submenu">
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/auto/catalog/" 							>
                            Каталог автомобилей						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/auto/doska/" 							>
                            Объявления						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/auto/news/" 							>
                            Новости						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/auto/test-drive/" 							>
                            Тест-драйвы						</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/realty/" 			>
                    Недвижимость		</a>


                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/doska/" 			>
                    Объявления		</a>


                  <div class="v5-submenu-wrap">
                    <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                      <ul class="v5-submenu">
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/doska/add-adv/" 							>
                            Подать объявление						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/doska/" 							>
                            Доска объявлений						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/auto/doska/" 							>
                            Продажа автомобилей						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/doska/realty/" 							>
                            Недвижимость						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/realty/doska/com/" 							>
                            Коммерческая недвижимость						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/realty/doska/zagorod/" 							>
                            Загородная недвижимость						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/doska/my/" 							>
                            Мои объявления						</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/gurman/" 			>
                    Еда		</a>


                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/afisha/" 			>
                    Афиша		</a>


                  <div class="v5-submenu-wrap">
                    <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                      <ul class="v5-submenu">
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/afisha/cinema/" 							>
                            Кино						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/afisha/show/" 							>
                            Концерты						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/afisha/theater/" 							>
                            Театры						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/afisha/kinder/" 							>
                            Для детей						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/afisha/club/" 							>
                            Вечеринки						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://afisha.properm.ru/horoscope/" 							>
                            Гороскоп						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/lottery/" 							>
                            Конкурсы						</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/talk/?bt=1&amp;ct=1" 			>
                    Общение		</a>


                  <div class="v5-submenu-wrap">
                    <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                      <ul class="v5-submenu">
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/users/" 							>
                            Пользователи						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/club/" 							>
                            Клубы						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://love.properm.ru/" 							>
                            Знакомства						</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/photo/" 			>
                    Фото		</a>


                  <div class="v5-submenu-wrap">
                    <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                      <ul class="v5-submenu">
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/photo/fresh/" 							>
                            Новые фото						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/photo/mupload/" 							>
                            Загрузить фото						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/photo/favorite/" 							>
                            Избранные						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/photo/my/" 							>
                            Мои фото						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/video/" 							>
                            Видео						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/video/my/" 							>
                            Моё видео						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/video/?upload" 							>
                            Загрузить видео						</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="v5-menu-item">
                  <a href="http://properm.ru/my/user/" 			>
                    Я на Properm.ru		</a>


                  <div class="v5-submenu-wrap">
                    <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                      <ul class="v5-submenu">
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/my/user/" 							>
                            Мой профиль						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/friends/" 							>
                            Мои друзья/группы						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/club/my/" 							>
                            Мои клубы						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/photo/my/" 							>
                            Мои фото						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/video/my/" 							>
                            Моё видео						</a>
                        </li>
                        <li class="v5-submenu-item">
                          <a href="http://properm.ru/doska/my/" 							 onclick="window_close(0); auth2_form_show(); return false;">
                            Мои объявления						</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </noindex>    </div>
      </div>