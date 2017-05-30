<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model backend\models\FrontendAdContent */
$this->title = 'Create Frontend Ad Content';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Ad Content', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
