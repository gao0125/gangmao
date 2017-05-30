<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FrontendInfo */

$this->title = '新增信息';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<a style="float:right" class="btn btn-primary" href="<?php echo Yii::$app->request->getHostInfo().Yii::$app->user->returnUrl.'/frontend-info/index?sort=-id';?>">返回</a>
<div class="frontend-ad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
