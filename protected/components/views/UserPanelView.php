<li class="head_menu_item head_menu_item-begin rc3">
  <span style="display: none; position: absolute;" id="host_for_login" class="properm.ru"></span>
  <a class="head_menu_item-login inline-block gpor_auth" onclick="return false;" 
     href="<?php echo Yii::app()->params['authData']['authHost'] ?>/?providers_set=properm,vk,lj,fb,tw,ya&amp;redirectUrl=<?php echo Yii::app()->request->getRequestUri() ?>&amp;returnUrl=<?php echo Yii::app()->request->getQuery('url') ?>">Войти</a>

  <span class="head_menu_item_label inline-block">с помощью:</span>

  <a provideruse="vk" onclick="return false;" href="<?php echo Yii::app()->params['authData']['authHost'] ?>/?providers_set=properm,vk,lj,fb,tw,ya&amp;redirectUrl=<?php echo Yii::app()->request->getRequestUri() ?>&amp;returnUrl=<?php echo Yii::app()->request->getQuery('url') ?>" class="gpor_auth" title=""><ins class="g-icons__middle-vk inline-block"></ins></a>
  <a provideruse="fb" onclick="return false;" href="<?php echo Yii::app()->params['authData']['authHost'] ?>/?providers_set=properm,vk,lj,fb,tw,ya&amp;redirectUrl=<?php echo Yii::app()->request->getRequestUri() ?>&amp;returnUrl=<?php echo Yii::app()->request->getQuery('url') ?>" class="gpor_auth" title="facebook"><ins class="g-icons__middle-fb inline-block"></ins></a>
  <a provideruse="tw" onclick="return false;" href="<?php echo Yii::app()->params['authData']['authHost'] ?>/?providers_set=properm,vk,lj,fb,tw,ya&amp;redirectUrl=<?php echo Yii::app()->request->getRequestUri() ?>&amp;returnUrl=<?php echo Yii::app()->request->getQuery('url') ?>" class="gpor_auth" title="twitter"><ins class="g-icons__middle-tw inline-block"></ins></a>
  <a provideruse="lj" onclick="return false;" href="<?php echo Yii::app()->params['authData']['authHost'] ?>/?providers_set=properm,vk,lj,fb,tw,ya&amp;redirectUrl=<?php echo Yii::app()->request->getRequestUri() ?>&amp;returnUrl=<?php echo Yii::app()->request->getQuery('url') ?>" class="gpor_auth" title="LiveJournal"><ins class="g-icons__middle-lj inline-block"></ins></a>

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
</li>
</ul>

<!-- js попапа аутентификации. Желательно ставить ближе к началу body -->
<script type="text/javascript" src="<?php echo Yii::app()->params['authData']['authHost']?>/auth/checkIsAuth/?providers_set=properm,vk,lj,fb,tw,ya&amp;redirectUrl=<?php echo Yii::app()->request->getRequestUri()?>&amp;returnUrl=<?php echo Yii::app()->request->getQuery('url')?>"></script>

<!-- обработчик случая, если пользователь аутентифицирован на бекэнде. Должно стоять после загрузки скрипта, т.к. в нем определяется GporAuth -->
<script type="text/javascript">
    GporAuth.run (function(token) {
        window.location.href = 'api.properm?auth_token='+token+'&returnUrl='<?php echo Yii::app()->createAbsoluteUrl(Yii::app()->request->url)?>;
        return;
    });
</script>