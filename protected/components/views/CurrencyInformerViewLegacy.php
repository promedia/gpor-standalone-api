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
        <td class="today">$ <?php echo $data['todayRate']['USD']['value'];?></td>
        <td class="dynamic">
           <?php 
           if (isset($data['yesterdayRate'])) { 
             $dif = $data['todayRate']['USD']['value'] - $data['yesterdayRate']['USD']['value'];
             if ($dif>0) {
               $sign = '+';
             } elseif ($dif<0) {
               $sign = '-';
             }
           }?>
          <span><?php echo $sign; ?></span>         <?php echo $dif; ?>         </td>
      </tr>
      <tr>
        <td class="today">€ <?php echo $data['todayRate']['EUR']['value'];?></td>
        <td class="dynamic">
           <?php 
           if (isset($data['yesterdayRate'])) { 
             $dif = $data['todayRate']['EUR']['value'] - $data['yesterdayRate']['EUR']['value'];
             if ($dif>0) {
               $sign = '+';
             } elseif ($dif<0) {
               $sign = '-';
             }
           }?>
          <span><?php echo $sign; ?></span>         <?php echo $dif; ?>         </td>
      </tr>
    </tbody>
  </table>
</div>