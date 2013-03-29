<ul class="head_menu context">
  <?php
  foreach ($data as $id => $item) {
    
    if ($item['status'] == 10) {
      
      if ($item['id'] == $activeItem) {
        ?>
        <li class="head_menu_item-current head_menu_item head_menu_item-has-submenu">
          
        <?php } else { ?>
        <li class="head_menu_item head_menu_item-has-submenu">
          
        <?php } ?>
          
        <a class="head_menu_item_link" href="<?= $item['url'] ?>">
          <?= $item['label'] ?>
              <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
        </a>

        <?php
        if (!empty($item['items'])) {
          ?>
          
          <ul class="head_submenu ie_layout">
            
            <?php
            foreach ($item['items'] as $id => $subitem) {
              ?>

              <li class="head_submenu_item ie_layout">
                <a class="head_submenu_item_link ie_layout"
                   href="<?= $subitem['url'] ?>"><?= $subitem['label'] ?></a>
              </li>
              
            <?php } ?>
              
          </ul>
          
        <?php } ?>
        <!--[if lt IE 7]></td></tr></table></a><![endif]-->

      </li>
      
      <?php
    }
  }
  ?>

  <? //Плашка регистрации/залогиненого пользователя    ?>
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