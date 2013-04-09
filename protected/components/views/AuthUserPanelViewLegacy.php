<div class="v5-login">
  <div class="v5-login-wrap">
    <div class="v5-login-wrap-wrap">
      <div class="v5-login-p v5-login-tl"></div>
      <div class="v5-login-p v5-login-tr"></div>
      <div class="v5-login-content">                  
        <span class="userLink">
          <a href="<?php echo $data['user']->url?>">
            <span style="white-space: nowrap;">
              <span style="margin-left: 5px;"><?php echo $data['user']->username?></span>
            </span>
          </a>
        </span>         &nbsp;&nbsp;&nbsp;
        <a href="<?php echo $authHost;?>/logout/?token=<?php echo $data['token'];?>&amp;returnUrl=<?php echo $returnUrl;?>">Выход</a>              
      </div>
    </div>
  </div>
  <div class="v5-login-p v5-login-bl"></div>
  <div class="v5-login-p v5-login-br"></div>
</div>