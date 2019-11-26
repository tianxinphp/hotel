<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DictionaryItem */

$this->title = 'Create Dictionary Item';
$this->params['breadcrumbs'][] = ['label' => 'Dictionary Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


