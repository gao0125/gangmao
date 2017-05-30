<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MMaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '材质管理';
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
            'name',
            'updated_by'=>[
                'attribute'=>'updated_by',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\User::find()->select('username')->where('id=:updated_by',[':updated_by'=>$model->updated_by])->asArray()->one();
                    return $name['username'];
                },
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
            // [
            //     'label'=>'材质管理',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
            //         return Html::a('管理', $url, ['title' => '材质管理']);
            //     }
            // ]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
