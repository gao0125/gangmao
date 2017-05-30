<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FrontendOrderInvoice */

$this->title = 'Create Frontend Order Invoice';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Order Invoice', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
