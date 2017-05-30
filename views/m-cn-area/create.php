<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MCnArea */

$this->title = Yii::$app->request->get('cz')=='province'?"新增省":(Yii::$app->request->get('cz')=='city'?'新增市':'新增县');
$this->params['breadcrumbs'][] = ['label' => 'M Cn Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<div class="frontend-ad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
