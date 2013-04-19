<?php

/**
 * Widget of weather informer
 * 
 * @author d.korepanova
 */
class WeatherInformerWidget extends CWidget {

  /**
   * Name of view to render
   * @var string  
   */
  protected $viewName;

  public function __construct() {

    $this->viewName = 'WeatherInformerView';
  }

  public function run() {

    // get cache
    $cacheKey = md5(serialize(array('type' => 'weather_informer')));

    $widgetCache = Yii::app()->cache->get($cacheKey);

    // if isset cache return it
    if ($widgetCache) {

      $this->render($this->viewName, array('data' => $widgetCache));
    } else {

      try {

        // get weather data array from 66 api
        $arrWeatherData = XMLRPCHelper::sendMessage('weather.getWeather');

        if (is_array($arrWeatherData) && isset($arrWeatherData['current'])) {

          // save cahce
          $cacheTime = !empty(Yii::app()->params['cachingPeriod']['weatherInformer']) ? Yii::app()->params['cachingPeriod']['weatherInformer'] : 60 * 60;
          Yii::app()->cache->set($cacheKey, $arrWeatherData, $cacheTime);

          $this->render($this->viewName, array('data' => $arrWeatherData));
        }
      } catch (Exception $e) {
        Yii::log('WeatherInformerWidget ' . $e->getMessage(), 'error');
      }
    }
  }

}

?>