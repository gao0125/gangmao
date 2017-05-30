<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendProductProcessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '加工管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-index">

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
            'userid',
            'orderid',
            'company_name',
            'contacts',
            'tel',
            [
                'attribute'=>'status',
                'label' => '状态',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsStatusText($model->status);
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',
                    \backend\models\FrontendProductProcess::$isStatus, ['class' => 'form-control'])
            ],
//            'transactionid',
            'total_price',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70']]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
