<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;
use backend\models\MCnArea;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MWarehouseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '仓库管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
 <?php 

    $modelss=new MCnArea();
?>
<div id='div1'style="display: none;">
   <?php $form = ActiveForm::begin(['action' => Url::to(['m-warehouse/index','ss'=>'搜索']),'enableClientValidation' => false]);?>

    <?= $form->field($modelss,'province')->dropDownList($modelss->getCityList(0),
        [
            'prompt'=>'--请选择省--',
            'onchange'=>'
                $(".form-group.field-member-area").hide();
                $.post("'.yii::$app->urlManager->createUrl('m-cn-area/site').'?typeid=1&pid="+$(this).val(),function(data){
                    $("select#mcnarea-city").html(data);
                });',
        ]) ?>

    <?= $form->field($modelss, 'city')->dropDownList($modelss->getCityList($modelss->province),
        [
            'prompt'=>'--请选择市--',
            
        ]) ?>
   
    <?= Html::submitButton('搜索',['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end();?>
    </div>
    <button id='bt1' onclick="show()">显示搜索框</button>
    <button id='bt2' style='display: none' onclick="hide()">隐藏搜索框</button>
    <script type="text/javascript">
       function show(){
        document.getElementById("div1").style.display="block";
        document.getElementById("bt2").style.display="block";
         document.getElementById("bt1").style.display="none";
       }
       function hide(){
        document.getElementById("div1").style.display="none";
        document.getElementById("bt2").style.display="none";
         document.getElementById("bt1").style.display="block";
       }
    </script>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            
            'updated_by'=>[
                'attribute'=>'updated_by',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\User::find()->select('username')->where('id=:updated_by',[':updated_by'=>$model->updated_by])->asArray()->one();
                    return $name['username'];
                },
                
            ],
            'm_cn_areaid'=>[

                'attribute'=>'m_cn_areaid',
                'format'=>'raw',
                'value'=>function($model){
                    $a=\backend\models\MCnArea::find()->where(['id'=>$model->m_cn_areaid])->all();
                    //$a=\backend\models\MCnArea::findAll(array('id'=>$model->m_cn_areaid)); 
                    $b=ArrayHelper::map($a, 'id', 'pid');
                    // $model=new MCnArea();
                    $cname=\backend\models\MCnArea::find()->where(['id' =>$b[$model->m_cn_areaid] ])->asArray()->one();
                    return $cname['name'];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
            // [
            //     'label'=>'仓库管理',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = \yii\helpers\Url::to(['m-warehouse/city', 'm_cn_areaid' => $data->m_cn_areaid,'id'=>$data->id]);
            //         return Html::a('管理', $url, ['title' => '仓库管理']);
            //     }
            // ]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
