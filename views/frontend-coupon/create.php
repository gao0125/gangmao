<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FrontendCoupon */

$this->title = 'Create Frontend Coupon';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Coupon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-coupon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
