<ul class="v5-menu">

    <?php
    foreach ($data as $id => $item) {

        if ($item['status'] == 10) {

            if ($item['id'] == $activeItem) {
                ?>
                <li class="v5-menu-item current">

                <?php } else { ?>
                <li class="v5-menu-item">

                <?php } ?>

                <a href="<?= $item['url'] ?>"><?= $item['label'] ?></a>

                <?php
                if (!empty($item['items'])) {
                    ?>

                    <div class="v5-submenu-wrap">
                        <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                            <ul class="v5-submenu">

                                <?php
                                foreach ($item['items'] as $id => $subitem) {
                                    ?>

                                    <li class="v5-submenu-item">
                                        <a href="<?= $subitem['url'] ?>" ><?= $subitem['label'] ?></a>
                                    </li>

                                <?php } ?>

                            </ul>
                        </div>
                    </div>

                <?php } ?>

            </li>

            <?php
        } elseif (($flag == 1) && ($item['status'] == 20)) {
            ?>
            <li class="v5-menu-item">

                <a href="<?= $item['url'] ?>"><?= $item['label'] ?></a>

                <?php
                if (!empty($item['items'])) {
                    ?>

                    <div class="v5-submenu-wrap">
                        <div class="v5-submenu"><div class="i-hate-opera">&nbsp;</div>
                            <ul class="v5-submenu">

                                <?php
                                foreach ($item['items'] as $id => $subitem) {
                                    ?>

                                    <li class="v5-submenu-item">
                                        <a href="<?= $subitem['url'] ?>" ><?= $subitem['label'] ?></a>
                                    </li>

                                <?php } ?>

                            </ul>
                        </div>
                    </div>

                <?php } ?>

            </li>
        <?php
        }
    }
    ?>

</ul>