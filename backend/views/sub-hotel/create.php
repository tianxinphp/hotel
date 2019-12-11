<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubHotel */

$this->title = 'Create Sub Hotel';
$this->params['breadcrumbs'][] = ['label' => 'Sub Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-hotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
