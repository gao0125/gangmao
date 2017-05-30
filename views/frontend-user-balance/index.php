<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendUserBalanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户余额';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>
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
            'amount',

             'created_at',
             'updated_at',
            

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'操作',
            'headerOptions'=>['width'=>'70'],
            'template' => '{view} {delete}',
            ],
            // [
            //     'label'=>'用户余额',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
            //         return Html::a('管理', $url, ['title' => '用户余额']);
            //     }
            // ]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
