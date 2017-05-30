<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendUserCompany */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend User Company', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除此项吗?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回', ['index'], ['style'=>'float: right','class' => 'btn btn-primary']) ?>
    </p>
<?php
$name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
?>
    <?php
        $ff=\backend\models\FrontendUserCompany::find()->select('imgs')->where(['id'=>$model->id])->asArray()->one();
        $ee=json_decode($ff['imgs']);
        $val='';
        foreach ($ee as $key => $value) {
            $val.=Html::img('/'.$value, ['width' => 200]).'&nbsp;&nbsp';
        }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>$name['nickname'],
                
            ],
            'company_name',
            'duty_paragraph',
            'bank',
            'back_account',
            'tel',
            'address',
             'imgs'=>[

                'attribute' => 'imgs',
                'label' => '照片',
                'format' => 'raw',
                'value' => $val,
             ],
            'status'=>[
                'attribute'=>'status',
                'format'=>'raw',
                'value'=>$model->status==0?'待认证':($model->status==1?'认证通过':'认证失败'),
                
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
