<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MStandardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '检验标准管理';
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
            'title',
            // //'userid'=>[
            //     'attribute'=>'userid',
            //     'format'=>'raw',
            //     'value'=>function($model){
            //         $name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
            //         return $name['nickname'];
            //     },
                
            // ],
            // 'filename',
            //'type',
            // 'size',
            // [
            //     'attribute'=>'class',
            //     'label' => '类别',
            //     'value' => function($model){
            //         switch($model->class)
            //         {
            //             case 0:
            //                 return "无安全级别";
            //                 break;
            //             case 1:
            //                 return "仅后台人员可看";
            //                 break;
            //             default:
            //                 return "暂无信息";
            //         }
            //     },
            // ],
            //'location',

            ['class' => 'yii\grid\ActionColumn'],
            // [
            //     'label'=>'检验管理',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
            //         return Html::a('管理', $url, ['title' => '检验管理']);
            //     }
            // ]
        ],
    ]); ?>
</div>
