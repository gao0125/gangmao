<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MSubject */

$this->title = '修改: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'M Subject', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<div class="frontend-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
