<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendResourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '资源管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-content-index">

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
            'userid',
            'status',
            'company_name',
            'cataid',
            'm_warehouseid',
            'steel_factory',
            'phone',
            [
                'attribute'=>'url',
                'format' =>['image',['width'=>'80','height'=>'50']],
            ],
             'created_at',
             'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
