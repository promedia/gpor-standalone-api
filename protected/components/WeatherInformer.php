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

      $this->render('WeatherInformerView' . $this->legacy, array('data' => $widgetCache));
    } else {

      $cacheTime = !empty(Yii::app()->params['cachingPeriod']['weatherInformer']) ? Yii::app()->params['cachingPeriod']['weatherInformer'] : 60 * 60;

      // get weather data array from 66 api
      $arrWeatherData = XMLRPCHelper::sendMessage('weather.getWeather');
      
      if (is_array($arrWeatherData) && isset($arrWeatherData['current'])) {
        
        // save cahce
        Yii::app()->cache->set($cacheKey, $arrWeatherData, 60 * 60);

        $this->render('WeatherInformerView' . $this->legacy, array('data' => $arrWeatherData));
      }
    }
  }

}

?>
