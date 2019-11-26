<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'header'=>'操作',
                'buttons'=>[
                    'update'=>function($url,$model,$key){
                        return Html::a('修改',$url,[
                            'title'=>'修改',
                            'class'=>'btn btn-default btn-update',
                            'data-toggle'=>'modal',
                            'data-target' => '#operate-modal',
                        ]);
                    },
                    'delete'=>function($url,$model,$key){
                        return Html::a('删除',$url,[
                            'title'=>'修改',
                            'class'=>'btn btn-default',
                            'data'=>[
                                'confirm'=>'确定要删除么?',
                                'method'=>'POST'
                            ]
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?php
    Modal::begin([
        'id' => 'operate-modal',
        'header' => '<h4 class="modal-title"></h4>',
    ]);
    Modal::end();
    $requestCreateUrl=Url::toRoute('create');
    $requestUpdateUrl=Url::toRoute('update');
    $js = <<<JS
    $('#create').on('click',function() {
        $(".modal-title").html('创建字典项');
        $.get('{$requestCreateUrl}',function(data) {
            $('.modal-body').html(data);
        });
    });
    $('.btn-update').on('click',function() {
        $(".modal-title").html('修改字典项');
        $.get('{$requestUpdateUrl}',function(data) {
            $('.modal-body').html(data);
        });
    });
JS;
    $this->registerJs($js);

    ?>

</div>
