<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendManufacturerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '生产厂家';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    //'userid',
                    'name',
                    //'updated_by',
                    'created_at',
                    'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
