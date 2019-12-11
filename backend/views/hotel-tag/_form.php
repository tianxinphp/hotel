<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HotelTag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-tag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sub_hotel_id')->textInput() ?>

    <?= $form->field($model, 'tag_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
