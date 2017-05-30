<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendOrderInvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '发票管理';
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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'orderid',
            'company_name',
            'duty_paragraph',
            'bank',
            'bank_account',
            'address',
            'tel',
            'consignee',
            'consignee_tel',
            'zip_code',
            'fax',
            'consignee_address',
           // 'detail',
            'status',
            'created_at',
            'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
            [
                'label'=>'产品说明',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
                    return Html::a('管理', $url, ['title' => '产品说明']); 
                }
            ]    
        ],
    ]); ?>
</div>
