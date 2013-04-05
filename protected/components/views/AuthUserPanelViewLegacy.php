<div class="v5-login">
  <div class="v5-login-wrap">
    <div class="v5-login-wrap-wrap">
      <div class="v5-login-p v5-login-tl"></div>
      <div class="v5-login-p v5-login-tr"></div>
      <div class="v5-login-content">                  
        <span class="userLink">
          <a href="<?php echo $user->url?>">
            <span style="white-space: nowrap;">
              <span style="margin-left: 5px;"><?php echo $user->username?></span>
            </span>
          </a>
        </span>         &nbsp;&nbsp;&nbsp;
        <a href="<?php echo Yii::app()->params['authData']['authHost']?>/logout/?token=e99dafa443bdf3d09563e5178009f76e&amp;returnUrl=<?php echo Yii::app()->createAbsoluteUrl(Yii::app()->request->url)?>">Выход</a>              
      </div>
    </div>
  </div>
  <div class="v5-login-p v5-login-bl"></div>
  <div class="v5-login-p v5-login-br"></div>
</div>