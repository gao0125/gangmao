<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendDeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '物流管理';
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
           // ['class' => 'yii\grid\SerialColumn'],

//            'id' ,
//            'userid',
//           'loading_point',
//            'unloading_point' ,
//            'cataid' ,
//            'weight' ,
//            'distance' ,
//            'price' ,
//            'created_at' ,
//            'updated_at' ,
            'id'   ,
            'userid',
            'orderid',
            'status' ,
            'consignee',
            'address',
            'total_price',
            'created_at' ,
            'updated_at',
            'tel',
              'tel',
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70']]

        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
           /* ['class' => 'yii\grid\ActionColumn'],
            [
                'label'=>'广告管理',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
                    return Html::a('管理', $url, ['title' => '广告管理']);
                }
            ]
        ],
    ]); ?>*/
</div>
