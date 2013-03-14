<div class="v5-weather">
  <div class="v5-weather-wrap">
    <div class="v5-weather-p v5-weather-tl"></div>
    <div class="v5-weather-p v5-weather-tr"></div>
    <div class="v5-weather-content">
      <p class="now">
        <b><?php echo $data['current']['temperature']; ?></b>
        <span><?php echo $data['current']['precipitationText']; ?></span>
      </p>
      <p class="icon">
        <span style="top: -<?php echo $data['current']['precipitation']*26;?>px;">
          <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/v5-weather-icons.png" alt="<?php echo $data['current']['precipitationText']; ?>" title="<?php echo $data['current']['precipitationText']; ?>">
        </span>
      </p>
      <ul class="next">
        <li>ночью: <span><?php echo $data['nextWeather']['night']; ?>° C</span></li>
        <li>завтра: <span><?php echo $data['nextWeather']['tomorrow']; ?>° C</span></li>
        <li>послезавтра: <span><?php echo $data['nextWeather']['afterTomorrow']; ?>° C</span></li>
      </ul>
      <p class="link">
        <a href="http://properm.ru/weather/">погода в Перми</a>
      </p>
    </div>
  </div>
  <div class="v5-weather-p v5-weather-bl"></div>
  <div class="v5-weather-p v5-weather-br"></div>
</div>