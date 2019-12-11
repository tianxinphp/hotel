<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Tag;

/* @var $this yii\web\View */
/* @var $model backend\models\SubHotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-hotel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sub_hotel_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_hotel_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'tag')->checkboxList(Tag::dropDownList())?>

    <?= $form->field($model, 'credate_at')->textInput() ?>

    <?= $form->field($model, 'update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
