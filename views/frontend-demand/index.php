<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendDemandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '求购';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',

            [
                'attribute'=>'status',
                'label' => '状态',
                'value' => function($model){
                    switch($model -> status){
                        case 0:
                            return "删除";
                            break;
                        case 1:
                            return "正常";
                            break;
                        default:
                            return "暂无数据";

                    }


                },

            ],
            'userid',
            [
                'attribute'=>'type',
                'label' => '状态',
                'value' => function($model){
                    //return $model->status == 1 ? "未审核" : "已审核";
                    switch($model->type)
                    {
                        case 1:
                            return "快递";
                            break;
                        case 2:
                            return "详细";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            'cataid',
            'cellphone',
            'quantity',
            [
                'attribute'=>'img_urls',
                'format' =>['image',['width'=>'150','height'=>'100']],
            ],
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
