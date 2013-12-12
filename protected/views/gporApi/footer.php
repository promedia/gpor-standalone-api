<div id="foot-wrap" class="ie_layout">
    <!--[if lt IE 7]>
    <div class="ie_max-width_left_frame"></div>
    <div class="ie_max-width_right_frame"></div>
    <![endif]-->
    <div id="foot" class="ie_layout">
        <?php
        //КБ с контентом и счетчиками 
        $this->widget('application.components.ContentBlockWidget', array('name' => $footerCB));
        ?>
    </div>  
</div>
</body></html>
