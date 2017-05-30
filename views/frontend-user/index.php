<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\MUserLevel;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户信息';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'cid',
            'headimgurl'=>[

                'attribute' => 'headimgurl',
                'label' => '头像',
                'format' => 'image',
                'value' => function($model){
                   
                    return '/'.$model->headimgurl;
                },
             ],
            'nickname',
            'real_name',
            'birth',
            [
                'attribute'=>'sex',
                'label' => '性别',
                'value' => function($model){
                    switch($model->sex)
                    {
                        case 1:
                            return "男";
                            break;
                        case 2:
                            return "女";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            'groupid',
            'company_name',
            'job_title',
            'city',
            'province',
            'country',
            'language',
            'remark',
            'privilege',

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
                            return "开启";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',
                    \backend\models\FrontendUser::$isStatus, ['class' => 'form-control'])
            ],
            'm_user_levelid'=>[
                'attribute'=>'m_user_levelid',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\MUserLevel::find()->select('name')->where('lv=:m_user_levelid',[':m_user_levelid'=>$model->m_user_levelid])->asArray()->one();
                    return $name['name'];
                },
                
            ],
            'auth_key',
            [
                'attribute'=>'is_first_buy',
                'label' => '首次购买',
                'value' => function($model){
                    switch($model->is_first_buy)
                    {
                        case 0:
                            return "否";
                            break;
                        case 1:
                            return "是";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            'created_at',
            'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{forbidden}',
                'header' => '操作',
                'headerOptions'=>['width'=>'60'],
                'buttons' => [
                    'forbidden' => function ( $url,$model, $key) {
                        return $model->status==0?(Html::a('启用',Url::to(['frontend-user/site','id'=>$model->id,'status'=>$model->status]))):(Html::a('禁用',Url::to(['frontend-user/site','id'=>$model->id,'status'=>$model->status])));},
                ],
            ],
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
