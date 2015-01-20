<?php

/**
 * Widget of weather informer
 * 
 * @author d.korepanova
 */
require_once(dirname(__FILE__) . "/../lib/CurlHelper/CurlHelper.php");

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
		
		//$config = Yii::app()->params['api'];
		//$client = new GporApiClient($config['host'], $config['key']);
        //$arrWeatherData = $client->call('weather.getWeather');
        //$arrWeatherData = XMLRPCHelper::sendMessage('weather.getWeather');
		
		$arrWeatherData = array();
		
		// get current weather data array
		$arrWeatherDataCurrent = CurlHelper::getUrl('http://essentialdata.gpor.ru/weathercurrent/perm/');
		$arrWeatherDataCurrent = json_decode($arrWeatherDataCurrent, true);
		
		if(is_array($arrWeatherDataCurrent)) {
			$arrWeatherData['current'] = $arrWeatherDataCurrent;
		}
		
		// get forecast weather data array
		$arrWeatherDataForecast = CurlHelper::getUrl('http://essentialdata.gpor.ru/weather/perm/');
		$arrWeatherDataForecast = json_decode($arrWeatherDataForecast, true);
		
		if(is_array($arrWeatherDataForecast)) {
			$arrWeatherData['forecast'] = $arrWeatherDataForecast;
		}

        if (is_array($arrWeatherData)) {

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