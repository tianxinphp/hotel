<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubHotel */

$this->title = 'Update Sub Hotel: ' . $model->sub_hotel_id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sub_hotel_id, 'url' => ['view', 'id' => $model->sub_hotel_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
