<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendUserMsgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '消息管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('批量删除', 'javascript:void(0);', ["class" => "btn btn-success gridview"]) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        "options" => ["class" => "grid-view","style"=>"overflow:auto", "id" => "grid"],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                "class" => "yii\grid\CheckboxColumn",
                "name" => "id",
            ],
                    'id',
                    'userid',
            [
                'attribute'=>'type',
                'label' => '状态',
                'value' => function($model){
                    switch($model->type)
                    {
                        case 1:
                            return "物流消息";
                            break;
                        case 2:
                            return "系统消息";
                            break;
                        case 3:
                            return "订单消息";
                            break;
                        case 4:
                            return "检验消息";
                            break;
                        case 5:
                            return "优惠券消息";
                            break;
                        case 6:
                            return "加工消息";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],

                    'content',
            [
                'attribute'=>'status',
                'label' => '状态',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsStatusText($model->status);
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status', \backend\models\FrontendUserMsg::$isStatus, ['class' => 'form-control'])
            ],

                    'created_at' ,
                    'updated_at' ,

            ['class' => 'yii\grid\ActionColumn'],

        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
        ]);
            $this->registerJs('
            $(document).on(\'click\', \'.gridview\', function () {
            var keys = $("#grid").yiiGridView("getSelectedRows");
            console.log(keys);
            $.post("index.php?r=frontend-user-msg%2Fdelete&id="+keys); 
        });
        ') ?>
</div>
