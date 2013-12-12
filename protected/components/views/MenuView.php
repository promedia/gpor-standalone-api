<ul class="head_menu context">
    <?php
    foreach ($data as $id => $item) {

        if ($item['status'] == 10) {

            if ($item['id'] == $activeItem) {
                ?>
                <li class="head_menu_item-current head_menu_item head_menu_item-has-submenu">

                <?php } else { ?>
                <li class="head_menu_item head_menu_item-has-submenu">

                <?php } ?>

                <a class="head_menu_item_link" href="<?= $item['url'] ?>">
                    <?= $item['label'] ?>
                      <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                </a>

                <?php
                if (!empty($item['items'])) {
                    ?>

                    <ul class="head_submenu ie_layout">

                        <?php
                        foreach ($item['items'] as $id => $subitem) {
                            ?>

                            <li class="head_submenu_item ie_layout">
                                <a class="head_submenu_item_link ie_layout"
                                   href="<?= $subitem['url'] ?>"><?= $subitem['label'] ?></a>
                            </li>

                        <?php } ?>

                    </ul>

                <?php } ?>
                <!--[if lt IE 7]></td></tr></table></a><![endif]-->

            </li>

            <?php } elseif (($flag == 1) && ($item['status'] == 20)) {
            ?>
            <li class="head_menu_item head_menu_item-has-submenu">

                <a class="head_menu_item_link" href="<?= $item['url'] ?>">
                    <?= $item['label'] ?>
                      <!--[if lt IE 7]><table class="ie_head_submenu"><tr><td><a><![endif]-->
                </a>

                <?php
                if (!empty($item['items'])) {
                    ?>

                    <ul class="head_submenu ie_layout">

                        <?php
                        foreach ($item['items'] as $id => $subitem) {
                            ?>

                            <li class="head_submenu_item ie_layout">
                                <a class="head_submenu_item_link ie_layout"
                                   href="<?= $subitem['url'] ?>"><?= $subitem['label'] ?></a>
                            </li>

                        <?php } ?>

                    </ul>

                <?php } ?>
                <!--[if lt IE 7]></td></tr></table></a><![endif]-->

            </li>
        <?php
        }
    }
    ?>

