<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendOrderDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单详情';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'orderid',
            'productid',
            'status',
            'title',
            'specification',
            'price',
            'num',
            'unit_name',
            'subtotal',
            'created_at' ,
            'updated_at' ,

            ['class' => 'yii\grid\ActionColumn'],
            [
                'label'=>'广告管理',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->orderid]);
                    return Html::a('管理', $url, ['title' => '广告管理']);
                }
            ]
        ],
    ]); ?>
</div>
