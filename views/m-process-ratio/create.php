<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MProcessRatio */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => 'M Process Ratio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
