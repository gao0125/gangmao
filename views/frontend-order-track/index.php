<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendOrderTrackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '发货信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'orderid',
            'productid',
            'traking_no',
            [
                'attribute'=>'status',
                'label' => '货物状态',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsStatusText($model->status);
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',
                    \backend\models\FrontendOrderTrack::$isStatus, ['class' => 'form-control'])
            ],
            'history',
            'created_at',
            'updated_at',


            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70']]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]);
    /*  $this->registerJs('
           $(document).on(\'click\', \'.gridview\', function () {
           var keys = $("#grid").yiiGridView("getSelectedRows");
           console.log(keys);
           $.post("index.php?r=frontend-ad-content%2Fdelete&id="+keys);
       });
       ')*/
    $this->registerJs('
            $(document).on(\'click\', \'.gridview\', function () {
            var keys = $("#grid").yiiGridView("getSelectedRows");
            console.log(keys);
            $.post("index.php?r=frontend-news%2Fdelete&id="+keys);
        });
        ')
    ?>
</div>
