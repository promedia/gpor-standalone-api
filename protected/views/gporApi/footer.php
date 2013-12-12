<div id="foot-wrap" class="ie_layout">
    <!--[if lt IE 7]>
    <div class="ie_max-width_left_frame"></div>
    <div class="ie_max-width_right_frame"></div>
    <![endif]-->
    <div id="foot" class="ie_layout">
        <div style="padding-top: 10px;" class="v5-logo">
          <a href="http://www.properm.ru/">
           <img style="top:10px" src="http://s.properm.ru/localStorage/f7/f5/df/a8/f7f5dfa8.png" alt="properm.ru" title="Современный портал Перми">
           <span style="margin-left: 120px;">
            Properm.ru &mdash; cовременный портал Перми. </span>
          </a>
          <br>
          <a style="margin-left: 120px;" href="http://properm.ru/hotels/">Гостиницы Перми</a>
          <a style="margin-left: 12px;" href="http://properm.ru/bank/">Банки Перми</a>
          <a style="margin-left: 12px;" href="http://properm.ru/weather/">Погода в Перми</a>
          <a style="margin-left: 12px;" href="http://properm.ru/auto/doska/">Авто с пробегом</a>
        </div>
        <?php
        //КБ с контентом и счетчиками 
        $this->widget('application.components.ContentBlockWidget', array('name' => $footerCB));
        ?>
    </div>  
</div>
</body></html>
