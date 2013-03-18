<div class="head_menu-top-currency">
  <table>
    <thead>
      <tr>
        <th class="head_menu-exchange-rates-th"><a class="head_menu-exchange-rates" href="http://newperm.gpor.ru/bank/currency/">курсы валют</a></th>
        <th class="head_menu-today"><span class="head_menu-today">на сегодня</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="head_menu-exchange-rates-td">
          <span class="head_menu-exchange-rates-sign">$</span>
          <span class="head_menu-exchange-rates-content"><?php echo $data['todayRate']['USD']['value']; ?></span>
        </td>
        <?php
          if (isset($data['yesterdayRate'])) {
            if ($data['todayRate']['USD']['value'] > $data['yesterdayRate']['USD']['value']) {
              $sign = '+';
              $dif = $data['todayRate']['USD']['value'] - $data['yesterdayRate']['USD']['value'];
            } elseif ($data['todayRate']['USD']['value'] < $data['yesterdayRate']['USD']['value']) {
              $sign = '&ndash;';
              $dif = $data['yesterdayRate']['USD']['value'] - $data['todayRate']['USD']['value'];
            } else {
              $sign = '';
              $dif = 0;
            }
          }
          ?>
        <td class="head_menu-today-td">
          <span class="head_menu-today-content">&nbsp;<?php echo $sign; ?><?php echo $dif; ?></span>
        </td>
      </tr>
      <tr>
        <td class="head_menu-exchange-rates-td">
          <span class="head_menu-exchange-rates-sign head_menu-exchange-rates-sign-e">€</span>
          <span class="head_menu-exchange-rates-content"><?php echo $data['todayRate']['EUR']['value']; ?></span>
        </td>
        <?php
          if (isset($data['yesterdayRate'])) {
            if ($data['todayRate']['EUR']['value'] > $data['yesterdayRate']['EUR']['value']) {
              $sign = '+';
              $dif = $data['todayRate']['EUR']['value'] - $data['yesterdayRate']['EUR']['value'];
            } elseif ($data['todayRate']['EUR']['value'] < $data['yesterdayRate']['EUR']['value']) {
              $sign = '-';
              $dif = $data['yesterdayRate']['EUR']['value'] - $data['todayRate']['EUR']['value'];
            } else {
              $sign = '';
              $dif = 0;
            }
          }
          ?>
        <td class="head_menu-today-td">
          <span class="head_menu-today-content">&nbsp;<?php echo $sign; ?><?php echo $dif; ?></span>
        </td>
      </tr>
    </tbody>
  </table>
</div>