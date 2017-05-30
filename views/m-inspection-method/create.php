<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MInspectionMethod */

$this->title = '新增检验方式';
$this->params['breadcrumbs'][] = ['label' => 'M Inspection Method', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
