<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MMaterial */

$this->title = '新增材质';
$this->params['breadcrumbs'][] = ['label' => 'M Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
