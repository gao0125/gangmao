<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendUserCreditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户积分';
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
//             'imgurl:url',
            // 'materialid',
            // 'specification',
            // 'production_tech',
            // 'standard',
            // 'm_warehouseid',
            // 'manufacturerid',
            // 'min_quantity',
            // 'quantity',
            // 'price',
            // 'unitid',
             'created_at',
             'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],

        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
