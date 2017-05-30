<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendCoupon */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Coupon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'shopid',
            'cataid',
            'productid',
            'm_user_levelids',
            'name',
            'type',
            'discount',
            'num',
            'rest_num',
            'period',
            'started_at',
            'expired_at',
            'created_at',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
