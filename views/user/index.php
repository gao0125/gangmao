<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            // 'password_hash',
            [
                'attribute'=>'status',
                'label' => '状态',
                'value' => function($model){
                    switch($model->status)
                    {
                        case 0:
                            return "禁用";
                            break;
                        case 10:
                            return "正常";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            // 'auth_key',
            // 'password_reset_token',
            'updated_at',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
//            'buttons' => [
//                'test' => function ($url, $model, $key) {
//                    return Html::a('测试按钮', $url,['data-method' => 'post','data-pjax'=>'0'] );
//        },
//                'delete'=> function ($url, $model, $key){
//                    return  Html::a('删除', ['delete', 'id'=>$model->id],[
//                        'data-method'=>'post',              //POST传值
//                        'data-confirm' => '确定删除该项？', //添加确认框
//                    ] ) ;
//                }
//            ],
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>

</div>
