<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendShopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商店管理';
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
//            [
//                'attribute'=>'id',
//                'headerOptions'=>['width'=>'20']
//            ],
            [
                'attribute'=>'logo',
                'value'=>function($model){
                    return $model->logo;
                },
                'format' =>['image',['width'=>'80','height'=>'80']],
            ],
            'name',
            'address',
            [
                'attribute'=>'status',
                'label' => '状态',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsStatusText($model->status);
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status', \backend\models\FrontendShop::$isStatus, ['class' => 'form-control'])
            ],
            [
                'attribute'=>'banner',
                'value'=>function($model){
                    return $model->banner;
                },
                'format' =>['image',['width'=>'120','height'=>'100']],
            ],
            'tel',
            'cellphone',
            'sphere',
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
