<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\frontendProductInspectionDetail;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendProductInspectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品检验管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::a('返回', ['frontend-product-inspection/index'], ['style'=>'float: right','class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'product_inspectionid',
            'cataid'=>[
                'attribute'=>'cataid',
                'label'=>'货物类型',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\FrontendCata::find()->select('name')->where('id=:cataid',[':cataid'=>$model->cataid])->asArray()->one();
                    return $name['name'];
                },
                
            ],
            'product_title',
            'product_standard'=>[
                'attribute'=>'product_standard',
                'label'=>'标准',
                'format'=>'raw',
                'value'=>function($model){
                    $pname=\backend\models\MStandard::find()->select('title')->where('id=:product_standard',[':product_standard'=>$model->product_standard])->asArray()->one();
                    return $pname['title'];
                },
                
            ],
            'm_materialid'=>[
                'attribute'=>'m_materialid',
                'label'=>'材质',
                'format'=>'raw',
                'value'=>function($model){
                    $czname=\backend\models\MMaterial::find()->select('name')->where('id=:m_materialid',[':m_materialid'=>$model->m_materialid])->asArray()->one();
                    return $czname['name'];
                },
                
            ],
            'specification',
            'weight',
            'm_inspectionid'=>[
                'attribute'=>'m_inspectionid',
                'label'=>'检验机构',
                'format'=>'raw',
                'value'=>function($model){
                    $jyname=\backend\models\MInspection::find()->select('name')->where('id=:m_inspectionid',[':m_inspectionid'=>$model->m_inspectionid])->asArray()->one();
                    return $jyname['name'];
                },
                
            ],
            [
                'attribute'=>'imgs',
                'format' =>['image',['width'=>'150','height'=>'100']],
            ],
            'm_inspection_methods'=>[
                'attribute'=>'m_inspection_methods',
                
                'format'=>'raw',
                'value'=>function($model){
                    $rt=json_decode($model->m_inspection_methods,1)==''?array():json_decode($model->m_inspection_methods,1);
                    $result='';
                    foreach ($rt as $key => $value) {
                        $result.= $value;
                    }
                    return $result;
                },
                
            ],
            'mem',
            'price',
            
            'created_at',
            'updated_at',
            [
                'attribute'=>'status',
                'label' => '订单状态',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsStatusText($model->status);
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70'],
                'template' => '{update} {delete}',],
            
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
