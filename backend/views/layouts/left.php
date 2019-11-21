<?php

use mdm\admin\components\MenuHelper;
use dmstr\widgets\Menu;
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <?=
        print_r(MenuHelper::getAssignedMenu(Yii::$app->user->id));
        Menu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
        ]);
        ?>
    </section>
</aside>