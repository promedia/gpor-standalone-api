<?php

/**
 * Widget of weather informer
 * 
 * @author d.korepanova
 */
class WeatherInformer extends CWidget {
  
  public $legacy = '';

  public function run() {

		// get cache
    $cacheKey = md5(serialize(array('type' => 'weather_informer')));

    $widgetCache = Yii::app()->cache->get($cacheKey);

    // if isset cache return it
    if ($widgetCache) {
      $this->render('WeatherInformerView'.$this->legacy, array('data' => $widgetCache));
      return true;
    }
    // getting name and content of CB
    $arrWeatherData = XMLRPCHelper::sendMessage('weather.getWeather');

    // save cahce
    Yii::app()->cache->set($cacheKey, $arrWeatherData, 60 * 60);

    $this->render('WeatherInformerView'.$this->legacy, array('data' => $arrWeatherData));

    return $outputHtml;
  }

}

?>
