<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MProcessMethod */

$this->title = '新增加工方法';
$this->params['breadcrumbs'][] = ['label' => 'M Process Method', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
