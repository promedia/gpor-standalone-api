<div class="head_menu-top-weather context rc5">
	<div class="head_menu-top-weather-left context">
		<?php if(is_array($data['current'])) {?>
			<div class="head_menu-top-weather-left-degree">
				<?php if ($data['current']['temperature'] > 0) echo '+'; ?><?php echo $data['current']['temperature']; ?>
			</div>
			
			<div class="head_menu-top-weather-left-weather-status">
				<table>
					<tbody><tr><td style="vertical-align: middle;"><?php echo $data['current']['condition']; ?></td></tr>
				</tbody></table>
			</div>
		<?php } ?>
		
		<div class="head_menu-top-weather-right-city">
			<a href="http://properm.ru/weather/">погода в Перми</a>
		</div>
	</div>
	<div class="head_menu-top-weather-right context ">
		<?php if(is_array($data['forecast'])) {?>
			<?php
				$currentDate = date('Y-m-d');
				if(is_array($data['forecast'][$currentDate]['night'])) {
			?>
					<div class="head_menu-top-weather-right-forecast">
						<span>ночью: </span>
						<span><?php if ($data['forecast'][$currentDate]['night']['temperature'] > 0) echo '+'; ?><?php echo $data['forecast'][$currentDate]['night']['temperature']; ?> °C</span>
					</div>
			<?php } ?>
			
			<?php
				$tomorrowDate = date('Y-m-d', strtotime('tomorrow'));
				if(is_array($data['forecast'][$tomorrowDate]['day'])) {
			?>
				<div class="head_menu-top-weather-right-forecast">
					<span>завтра: </span>
					<span><?php if ($data['forecast'][$tomorrowDate]['day']['temperature'] > 0) echo '+'; ?><?php echo $data['forecast'][$tomorrowDate]['day']['temperature']; ?> °C</span>
				</div>
			<?php } ?>
			
			<?php
				$dayAfterTomorrowDate = date('Y-m-d', strtotime('+2 day'));
				if(is_array($data['forecast'][$dayAfterTomorrowDate]['day'])) {
			?>
				<div class="head_menu-top-weather-right-forecast">
					<span>послезавтра: </span>
					<span><?php if ($data['forecast'][$dayAfterTomorrowDate]['day']['temperature'] > 0) echo '+'; ?><?php echo $data['forecast'][$dayAfterTomorrowDate]['day']['temperature']; ?> °C</span>
				</div>
			<?php } ?>
			
		<?php } ?>
	</div>
	<!--<style type="text/css">
		.head_menu-weather-status { background: url('<?= Yii::app()->request->getBaseUrl(true) ?>/img/weather-icons.png') 0 -<?php echo $data['current']['precipitation']*43;?>px no-repeat; }
	</style>-->
	
	<div class="head_menu-weather-status">&nbsp;</div>
	
</div>
