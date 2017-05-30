<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendOrderPaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '支付信息';
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
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'status',
            'orderid',
            'transactionid',
            'amount',
            'type',
            'mem',
            [
                'attribute'=>'receipt_imgs',
                'format' => 'raw',
                'value' => function($model){
                    height:;
                    width:;
                    return Html::img($model->receipt_imgs);
                }
            ],
            // 'specification',
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

            ['class' => 'yii\grid\ActionColumn'],
            [
                'label'=>'广告管理',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
                    return Html::a('管理', $url, ['title' => '广告管理']);
                }
            ]
        ],
    ]); ?>
</div>
