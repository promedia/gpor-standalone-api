<div class="v5-weather">
  <div class="v5-weather-wrap">
    <div class="v5-weather-p v5-weather-tl"></div>
    <div class="v5-weather-p v5-weather-tr"></div>
    <div class="v5-weather-content">
	  <?php if(is_array($data['current'])) {?>
		  <p class="now">
			<b><?php if ($data['current']['temperature'] > 0) echo '+'; ?><?php echo $data['current']['temperature']; ?></b>
			<span><?php $data['current']['condition']; ?></span>
		  </p>
		  <!--<p class="icon">
			<span style="top: -<?php echo $data['current']['precipitation']*26;?>px;">
			  <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/v5-weather-icons.png" alt="<?php echo $data['current']['precipitationText']; ?>" title="<?php echo $data['current']['precipitationText']; ?>">
			</span>
		  </p>-->
	  <?php } ?>
	  
	  <?php if(is_array($data['forecast'])) {?>
		  <ul class="next">
			<?php
				$currentDate = date('Y-m-d');
				if(is_array($data['forecast'][$currentDate]['night'])) {
			?>
				<li>ночью: <span><?php if ($data['forecast'][$currentDate]['night']['temperature'] > 0) echo '+'; ?><?php echo $data['forecast'][$currentDate]['night']['temperature']; ?>° C</span></li>
			<?php } ?>
			
			<?php
				$tomorrowDate = date('Y-m-d', strtotime('tomorrow'));
				if(is_array($data['forecast'][$tomorrowDate]['day'])) {
			?>
				<li>завтра: <span><?php if ($data['forecast'][$tomorrowDate]['day']['temperature'] > 0) echo '+'; ?><?php echo $data['forecast'][$tomorrowDate]['day']['temperature']; ?>° C</span></li>
			<?php } ?>
			
			<?php
				$dayAfterTomorrowDate = date('Y-m-d', strtotime('+2 day'));
				if(is_array($data['forecast'][$dayAfterTomorrowDate]['day'])) {
			?>
				<li>послезавтра: <span><?php if ($data['forecast'][$dayAfterTomorrowDate]['day']['temperature'] > 0) echo '+'; ?><?php echo $data['forecast'][$dayAfterTomorrowDate]['day']['temperature']; ?>° C</span></li>
			<?php } ?>
		  </ul>
	  <?php } ?>
      <p class="link">
        <a href="http://properm.ru/weather/">погода в Перми</a>
      </p>
    </div>
  </div>
  <div class="v5-weather-p v5-weather-bl"></div>
  <div class="v5-weather-p v5-weather-br"></div>
</div>