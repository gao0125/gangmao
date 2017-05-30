<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductDesc */

$this->title = '增加说明';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Product Descs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-desc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'productid' => $productid
    ]) ?>

</div>
