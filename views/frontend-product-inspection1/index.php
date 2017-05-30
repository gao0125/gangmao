<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendProductInspectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品检验管理';
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
            'm_inspectionid',
            'm_inspection_methods',
            [
                'attribute'=>'imgs',
                'format' =>['image',['width'=>'150','height'=>'100']],
            ],
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
