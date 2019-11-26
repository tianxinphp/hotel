<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DictionaryItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dictionary Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dictionary Item', ['create'], ['class' => 'btn btn-success','id'=>'create','data-toggle'=>'modal','data-target'=>'#operate-modal']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?php
    Modal::begin([
        'id' => 'operate-modal',
        'header' => '<h4 class="modal-title"></h4>',
    ]);
    Modal::end();
    ?>

</div>
