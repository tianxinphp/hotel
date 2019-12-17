<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\assets\SubHotelAsset;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubHotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
SubHotelAsset::register($this);
$this->title = 'Sub Hotels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sub Hotel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sub_hotel_id',
            'sub_hotel_name',
            'sub_hotel_code',
            'credate_at',
            'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
