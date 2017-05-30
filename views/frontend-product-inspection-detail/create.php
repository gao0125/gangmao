<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductInspectionDetail */

$this->title = 'Create Frontend Product Inspection Detail';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Product Inspection Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-inspection-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
