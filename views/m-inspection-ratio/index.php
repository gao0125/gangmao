<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MInspectionRatioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '检验比管理';
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
                            return "每日工时";
                            break;
                        case 1:
                            return "产品类型";
                            break;
                        case 2:
                            return "吨数";
                            break;
                        case 3:
                            return "检验方式系";
                            break;
                        case 4:
                            return "检验机构";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            'value',
            'ratio',

            ['class' => 'yii\grid\ActionColumn'],
            // [
            //     'label'=>'检验机构管理',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
            //         return Html::a('管理', $url, ['title' => '检验机构管理']);
            //     }
            // ]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
