<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendAdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('批量删除','javascript:void(0);',["class" => "btn btn-success gridview"]) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        "options"=>["class"=>"grid-view","style"=>"overflow:auto","id"=>"grid"],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [  "class"=>"yii\grid\CheckboxColumn",
                "name"=>"id",
                'headerOptions'=>['width'=>'20']
            ],
            'id',
            [
                'attribute'=>'plantform',
                'label' => '平台',
                'value'=> function($model){


                    switch($model->plantform)
                    {
                        case 0:
                            return "pc端";
                            break;
                        case 1:
                            return "ios端";
                            break;
                        case 2:
                            return "andriod端";
                            break;
                        default:
                            return "暂无信息";
                    }


                }



            ],
            [
                'attribute'=>'sectionid',
                'label' => '位置',
                'value' => function($model){
                    //return $model->status == 1 ? "未审核" : "已审核";
                    switch($model->sectionid)
                    {
                        case 1:
                            return "首页";
                            break;
                        case 2:
                            return "列表";
                            break;
                        case 3:
                            return "新闻";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            [
                'attribute'=>'status',
                'label' => '状态',
                'value' => function($model){
                    //return $model->status == 1 ? "未审核" : "已审核";
                    switch($model->status)
                    {
                        case 0:
                            return "下线";
                            break;
                        case 1:
                            return "在线";
                            break;
                        default:
                            return "暂无信息";
                    }
                },

                /*'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsStatusText($model->status);
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status', \backend\models\FrontendAd::$isStatus, ['class' => 'form-control'])*/
            ],
            [
                'attribute'=>'type',
                'label' => '状态',
                'value' => function($model){
                    //return $model->status == 1 ? "未审核" : "已审核";
                    switch($model->type)
                    {
                        case 0:
                            return "banner";
                            break;
                        case 1:
                            return "set banner";
                            break;
                        default:
                            return "banner";
                    }
                },
            ],
            'desc',
            'created_at',
            'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70']]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]);
    $this->registerJs('
            $(document).on(\'click\', \'.gridview\', function () {
            var keys = $("#grid").yiiGridView("getSelectedRows");
            console.log(keys);
            $.post("index.php?r=frontend-ad%2Fdelete&id="+keys);
        });
        ')
    ?>
</div>
