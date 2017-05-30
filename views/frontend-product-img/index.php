<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendProductImgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品图片';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-img-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('上传图片',  ['create', 'productid' => $productid], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'productid',
            'pos',
            'hash',
            'filename',
            // 'filetype',
            // 'size',
            // 'location',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
