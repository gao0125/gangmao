<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendAdSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告区域管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'desc',
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

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70']]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
