<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendUserCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户认证管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
                    return $name['nickname'];
                },
                
            ],
            'company_name',
            'bank',
            'tel',
            'address',

            [
                'attribute'=>'status',
                'label' => '状态',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    //return  $model->getIsStatusText($model->status);
                      switch($model->status)
                    {
                        case 0:
                            return "待认证";
                            break;
                        case 1:
                            return "认证通过";
                            break;
                        case 2:
                            return "认证失败";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',
                    \backend\models\FrontendUserCompany::$isStatus, ['class' => 'form-control'])
            ],
            // [
            //     'attribute'=>'imgs',
            //     'format' =>['image',['width'=>'150','height'=>'100']],
            // ],
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'操作',
            'headerOptions'=>['width'=>'70'],
            'template' => '{view} {update} {delete}',
            ],
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]);?>
</div>
