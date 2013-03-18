<div class="v5-currency" style="width: 110px;">
  <table>
    <thead>
      <tr>
        <td class="today"><a href="/bank/currency/" name="aa">курсы валют</a></td>
        <td class="dynamic">сегодня</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="today">$ <?php echo $data['todayRate']['USD']['value']; ?></td>
        <td class="dynamic">
          <?php
          if (isset($data['yesterdayRate'])) {
            if ($data['todayRate']['USD']['value'] > $data['yesterdayRate']['USD']['value']) {
              $sign = '+';
              $dif = $data['todayRate']['USD']['value'] - $data['yesterdayRate']['USD']['value'];
            } elseif ($data['todayRate']['USD']['value'] < $data['yesterdayRate']['USD']['value']) {
              $sign = '-';
              $dif = $data['yesterdayRate']['USD']['value'] - $data['todayRate']['USD']['value'];
            } else {
              $sign = '';
              $dif = 0;
            }
          }
          ?>
          <span><?php echo $sign; ?></span>         <?php echo $dif; ?>         </td>
      </tr>
      <tr>
        <td class="today">€ <?php echo $data['todayRate']['EUR']['value']; ?></td>
        <td class="dynamic">
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
          <span><?php echo $sign; ?></span>         <?php echo $dif; ?>         </td>
      </tr>
    </tbody>
  </table>
</div>