<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MSubject */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => 'M Subject', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<div class="frontend-ad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
