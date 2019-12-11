<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HotelTag */

$this->title = 'Create Hotel Tag';
$this->params['breadcrumbs'][] = ['label' => 'Hotel Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
