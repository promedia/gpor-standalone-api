<?php

/**
 * Widget of currency informer
 * 
 * @author d.korepanova
 */
class CurrencyInformerWidget extends CWidget {

  /**
   * Name of view to render
   * @var string  
   */
  protected $viewName;

  public function __construct() {

    $this->viewName = 'CurrencyInformerView';
  }

  public function run() {

    // get cache
    $cacheKey = md5(serialize(array('type' => 'currency_informer')));
    $widgetCache = Yii::app()->cache->get($cacheKey);

    // if isset cache return it
    if ($widgetCache) {
      $cacheTime = !empty(Yii::app()->params['cachingPeriod']['currencyInformer']) ? Yii::app()->params['cachingPeriod']['currencyInformer'] : 60 * 60;

      $this->render($this->viewName, array('data' => $widgetCache));
    } else {

      // if have date for rate
      $source = @file_get_contents('http://essentialdata.gpor.ru/rates/default/');
      if ($source) {

        // result array to view
        $arrCurrencyData = array();

        // parse json data and prepare result array
        $arrJsonData = json_decode($source, true);
        if (is_array($arrJsonData) && count($arrJsonData) > 0) {

          // loop through date to find today and the-day-before rate
          foreach ($arrJsonData as $date => $rateByDate) {

            $arrRate = array();

            // loop through rates for date to find USD and EURO rates
            foreach ($rateByDate as $currencyRate) {

              if ($currencyRate['charCode'] == 'USD') {
                $arrRate['USD'] = $currencyRate;
              } elseif ($currencyRate['charCode'] == 'EUR') {
                $arrRate['EUR'] = $currencyRate;
              }
            }

            // save in yeasterday array or today and stop search
            if ($date == date('Y-m-d')) {
              $arrCurrencyData['todayRate'] = $arrRate;
              break;
            } else {
              $arrCurrencyData['yesterdayRate'] = $arrRate;
            }
          }
        }

        $this->render($this->viewName, array('data' => $arrCurrencyData));
      }
    }
  }

}

?>
