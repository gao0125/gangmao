<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendInfo */

$this->title = '修改信息: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Ad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<a style="float:right" class="btn btn-primary" href="<?php echo Yii::$app->request->getHostInfo().Yii::$app->user->returnUrl.'/frontend-info/index?sort=-id';?>">返回</a>
<div class="frontend-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
