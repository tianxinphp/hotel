<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HotelTag */

$this->title = 'Update Hotel Tag: ' . $model->sub_hotel_id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sub_hotel_id, 'url' => ['view', 'sub_hotel_id' => $model->sub_hotel_id, 'tag_id' => $model->tag_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotel-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
