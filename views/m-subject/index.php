<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MSubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '积分余额管理';
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
                            return "每日多次";
                            break;
                        case 1:
                            return "每日只能一次";
                            break;
                        case 2:
                            return "只有一次";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'type',
                    \backend\models\MSubject::$isStatus, ['class' => 'form-control'])
            ],
            'name',
            [
                'attribute'=>'class',
                'label' => 'Class',
                'value' => function($model){
                    switch($model->class)
                    {
                        case 0:
                            return "积分相关";
                            break;
                        case 1:
                            return "余额相关";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'class',
                    \backend\models\MSubject::$is_Status, ['class' => 'form-control'])
            ],
            'val',
            ['class' => 'yii\grid\ActionColumn'],
            // [
            //     'label'=>'积分余额管理',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
            //         return Html::a('管理', $url, ['title' => '积分余额管理']);
            //     }
            // ]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
