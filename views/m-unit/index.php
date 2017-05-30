<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '单位管理';
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
            // 'updated_by'=>[
            //     'attribute'=>'updated_by',
            //     'format'=>'raw',
            //     'value'=>function($model){
            //         $name=\backend\models\User::find()->select('username')->where('id=:updated_by',[':updated_by'=>$model->updated_by])->asArray()->one();
            //         return $name['username'];
            //     },
                
            // ],

            ['class' => 'yii\grid\ActionColumn'],
            
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
