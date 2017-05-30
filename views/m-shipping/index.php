<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MShippingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '运送方式管理';
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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'type',
                'label' => '状态',
                'value' => function($model){
                    switch($model->type)
                    {
                        case 0:
                            return "关闭";
                            break;
                        case 1:
                            return "开启";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            'name',
            'desc',

            ['class' => 'yii\grid\ActionColumn','header'=>'操作',
            'headerOptions'=>['width'=>'70'],],
            
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
