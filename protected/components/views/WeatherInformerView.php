<div class="head_menu-top-weather context rc5">
	<div class="head_menu-top-weather-left context">
		<div class="head_menu-top-weather-left-degree">
			<?php echo $data['current']['temperature']; ?>
		</div>
		
		<div class="head_menu-top-weather-left-weather-status">
			<table>
				<tbody><tr><td style="vertical-align: middle;"><?php echo $data['current']['precipitationText']; ?></td></tr>
			</tbody></table>
		</div>		
		
		<div class="head_menu-top-weather-right-city">
			<a href="http://properm.ru/weather/">погода в Перми</a>
		</div>
	</div>
	<div class="head_menu-top-weather-right context ">
		<div class="head_menu-top-weather-right-forecast">
			<span>ночью: </span>
			<span><?php echo $data['nextWeather']['night']; ?> °C</span>
		</div>
		<div class="head_menu-top-weather-right-forecast">
			<span>завтра: </span>
			<span><?php echo $data['nextWeather']['tomorrow']; ?> °C</span>
		</div>
		<div class="head_menu-top-weather-right-forecast">
			<span>послезавтра: </span>
			<span><?php echo $data['nextWeather']['afterTomorrow']; ?> °C</span>
		</div>
	</div>
	<style type="text/css">
		.head_menu-weather-status { background: url('<?= Yii::app()->request->getBaseUrl(true) ?>/img/weather-icons.png') 0 -<?php echo $data['current']['precipitation']*43;?>px no-repeat; }
	</style>
	
	<div class="head_menu-weather-status">&nbsp;</div>
	
	</div>
