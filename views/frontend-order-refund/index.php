<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendOrderRefundSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '退款信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-order-payment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            'id',
            'userid',
            'orderid',
            'productid',
            'num',
            [
                'attribute'=>'status',
                'label' => '退款状态',
                'headerOptions'=>['width' =>'120'],
                'value' => function($model){
                    return $model->getIsStatusText($model->status);
                },
                'filter' =>\yii\helpers\Html::activeDropDownList($searchModel, 'status',
                    \backend\models\FrontendOrderRefund::$isStatus, ['class' => 'form-control'])




            ],


            'reason',
            'explain',
            // 'production_tech',
            // 'standard',
            // 'm_warehouseid',
            // 'manufacturerid',
            // 'min_quantity',
            // 'quantity',
            // 'price',
            // 'unitid',
             'created_at',
             'updated_at',
            // 'updated_by',


            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70']]

        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",

//                'value' => function($data){
//                    $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
//                    return Html::a('管理', $url, ['title' => '广告管理']);
//                }




    ]); ?>
</div>
