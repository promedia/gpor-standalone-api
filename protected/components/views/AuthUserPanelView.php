<li class="head_menu_item head_menu_item-profile">
  <div class="profile-logo rc5 context">
    <a class="profile-nick-name profile-nick-properm" href="<?php echo $user->url?>"><?php echo $user->username?></a>
    <a class="profile-nick-logout" 
       href="<?php echo Yii::app()->params['authData']['authHost']?>/logout/?token=e99dafa443bdf3d09563e5178009f76e&amp;returnUrl=<?php echo Yii::app()->createAbsoluteUrl(Yii::app()->request->url)?>" title="выйти"></a>
  </div>

  <span id="mailCount"></span>
  <script type="text/javascript">
    try {
      if ($.url().attr('anchor').length > 0) {
        var element = $('a.profile-nick-logout');
        var href = element.attr('href');
        href = href.replace($.url(href).param('returnUrl'),encodeURIComponent(window.location));
        element.attr('href', href);
      }
    }
    catch (err) {}
  </script>
</li>
</ul>