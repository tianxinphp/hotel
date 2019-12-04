<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Test', ['create'], [
            'class' => 'btn btn-success',
            'id'=>'create',
            'data-toggle' => 'modal',
            'data-target' => '#operate-modal',
        ]) ?>
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
                'template'=>'{view} {update}  {delete}',
                'header'=>'操作',
                'buttons'=>[
                    'view'=>function($url, $model, $key){
                        return Html::a("浏览", $url, [
                            'title' => '浏览',
                            'class' => 'btn btn-default btn-view',
                            'data-toggle' => 'modal',
                            'data-target' => '#operate-modal',
                        ]);
                    },
                    'update'=>function($url, $model, $key){
                        return Html::a("修改", $url, [
                            'title' => '修改',
                            'class' => 'btn btn-default btn-update',
                            'data-toggle' => 'modal',
                            'data-target' => '#operate-modal',
                        ]);
                    },
                    'delete'=>function($url, $model, $key){
                        return Html::a("删除", $url, [
                            'title' => '删除',
                            'class' => 'btn btn-default btn-delete',
                            'data'=>[
                                'confirm' => '确定要删除么?',
                                'method' => 'post',
                            ]
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?php    Modal::begin([
        'id' => 'operate-modal',
        'header' => '<h4 class="modal-title"></h4>',
    ]);
    Modal::end();
    $requestCreateUrl = Url::toRoute('create');
    $requestUpdateUrl = Url::toRoute('update');
    $js = <<<JS
    $('#create').on('click', function () {
        $('.modal-title').html('创建');
        $.get('{$requestCreateUrl}',
            function (data) {
                $('.modal-body').html(data);
            }
        );
    });
    $('.btn-update').on('click', function () {
        $('.modal-title').html('更新');
        $.get('{$requestUpdateUrl}', { id: $(this).closest('tr').data('key') },
            function (data) {
                $('.modal-body').html(data);
            }
        );
    });
JS;
    $this->registerJs($js);
    ?>

</div>
