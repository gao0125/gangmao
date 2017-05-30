<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Search\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '反馈';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

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
            'name',
            'tel',
            'email:email',
            'brief',
            'content:ntext',
            //'imgs',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'操作',
            'headerOptions'=>['width'=>'70'],
            'template' => '{view} {delete}',
            ],
        ],
    ]);?>
</div>
