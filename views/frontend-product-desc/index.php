<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendProductDesc */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商品说明管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-desc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加说明', ['create', 'productid' => $productid], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'productid',
         //   'type',
            ['attribute'=>'type','value'=>function($data){return $data->type == 1 ?  '移动' : 'PC';}],//[1=>'移动', 2=>'pc']
            ['attribute'=>'section','value'=>function($data){   switch($data->section){ case 1 : return '基本介绍'; case 2: return '规格参数'; case 3 :'售后服务'; };}],//[1=>'基本介绍', 2=>'规格参数', 3=>'售后服务']
          //  ['attribute'=>'desc' , 'format' => 'html','value'=>function($data){ return $data->desc; }],
            //'desc:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
