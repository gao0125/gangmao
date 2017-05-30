<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendUserCoupon */

$this->title = '预览';
$this->params['breadcrumbs'][] = ['label' => 'Frontend User Coupon', 'url' => ['index']];
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
        <?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
    </p>
    <?php 
    $name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
    $shopName=\backend\models\FrontendShop::find()->select('name')->where('id=:shopid',[':shopid'=>$model->shopid])->asArray()->one();
    $couponName=\backend\models\FrontendCoupon::find()->select('name')->where('id=:couponid',[':couponid'=>$model->couponid])->asArray()->one();
    $cataName=\backend\models\FrontendCata::find()->select('name')->where('id=:cataid',[':cataid'=>$model->cataid])->asArray()->one();
    $productName=\backend\models\FrontendProduct::find()->select('title')->where('id=:productid',[':productid'=>$model->productid])->asArray()->one();
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'couponid'=>[
                'attribute'=>'couponid',
                'format'=>'raw',
                'value'=>$couponName['name'],
                
            ],
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>$name['nickname'],
                
            ],
            'status'=>[
                'attribute'=>'status',
                'format'=>'raw',
                'value'=>$model->status==0?'无效':($model->status==1?'有效':'未开始'),
                
            ],
            'shopid'=>[
                'attribute'=>'shopid',
                'format'=>'raw',
                'value'=>$shopName['name'],
                
            ],
            'cataid'=>[
                'attribute'=>'cataid',
                'format'=>'raw',
                'value'=>$cataName['name'],
                
            ],
            'productid'=>[
                'attribute'=>'productid',
                'format'=>'raw',
                'value'=>$productName['title'],
                
            ],
            'name',
            'type'=>[
                'attribute'=>'type',
                'format'=>'raw',
                'value'=>$model->type==1?'固定':'百分比',
                
            ],
            'discount',
            'started_at',
            'expired_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
