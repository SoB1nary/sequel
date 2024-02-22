<?php

use app\models\ColorsOfStock;

if (isset($_POST['stock_create'])) {
    $raw_colors=$_POST['raw_colors'];
    $stock_id=$_POST['stock_id'];
    foreach($raw_colors as $color_id)
    {
        ColorsOfStock::createCOS($stock_id, $color_id);
    }

}