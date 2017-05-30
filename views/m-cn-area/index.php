<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use backend\models\MCnArea;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
//use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel backend\model\search\MCnAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '区域管理';
$this->params['breadcrumbs'][] = $this->title;


?>
<?php if(!empty(Yii::$app->request->get('gid'))):?>
<?= Html::a('返回', ['index'], ['style'=>'float: right','class' => 'btn btn-primary']) ?>
<?php endif;?>
<?php 
if(Yii::$app->session->hasFlash('info')){
    echo "<div style='color:red;font-size:20px;text-align:center'>";
    echo Yii::$app->session->getFlash('info');
    echo "</div>";
}
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::a('新增省', ['create','cz'=>'province'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('新增市', ['create','cz'=>'city'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('新增县', ['create','cz'=>'area'], ['class' => 'btn btn-success']) ?>
    
    </p>

    <?php 
    $model=new MCnArea();
    
    ?>
<div id='div1'style="display: none;">
   <?php $form = ActiveForm::begin(['action' => Url::to(['m-cn-area/index','ss'=>'搜索']),'enableClientValidation' => false]);?>

    <?= $form->field($model,'province')->dropDownList($model->getCityList(0),
        [
            'prompt'=>'--请选择省--',
            'onchange'=>'
                $(".form-group.field-member-area").hide();
                $.post("'.yii::$app->urlManager->createUrl('m-cn-area/site').'?typeid=1&pid="+$(this).val(),function(data){
                    $("select#mcnarea-city").html(data);
                });',
        ]) ?>

    <?= $form->field($model, 'city')->dropDownList($model->getCityList($model->province),
        [
            'prompt'=>'--请选择市--',
            'onchange'=>'
                $(".form-group.field-member-area").show();
                $.post("'.yii::$app->urlManager->createUrl('m-cn-area/site').'?typeid=2&pid="+$(this).val(),function(data){
                    $("select#mcnarea-area").html(data);
                });',
        ]) ?>
    <?= $form->field($model, 'area')->dropDownList($model->getCityList($model->city),['prompt'=>'--请选择区--',]) ?>
    <?= Html::submitButton('搜索',['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end();?>
    </div>
    <!--显示隐藏搜索框-->
    <button id='bt1' onclick="show()">显示搜索框</button>
    <button id='bt2' style='display: none' onclick="hide()">隐藏搜索框</button>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            
            'name',
            ['class' => 'backend\components\ActionColumn',
          
            'header'=>'操作',
            'headerOptions'=>['width'=>'70'],
            'template' => '{view}{update}{delete}',//控制几个按钮的
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'delete' => function ($url, $model, $key) {
                        if(\backend\models\MCnArea::find()->where(['pid'=>$model->id])->one()){
                            
                            return Html::a('<span style="color:gray" class="glyphicon glyphicon-trash"></span>', null,[]);
                        }else{
                            $options = [
                                'title' => Yii::t('yii', '删除'),
                                'aria-label' => Yii::t('yii', 'Delete'),
                                //'data-confirm' => Yii::t('yii', '是否要删除本区域?'),
                                'data-method' => 'post',
                                'data-pjax' => '1',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                        }
                    },
                ]
            ],

         
            [
                'label'=>'区域管理',
                'format'=>'raw',
                'value' => function($data){
                   if(\backend\models\MCnArea::find()->where(['pid'=>$data->id])->one()){
                        $url = \yii\helpers\Url::to(['m-cn-area/index', 'gid' => $data->id]);
                        return Html::a('管理', $url, ['title' => '管理']);
                    }else{
                        return Html::a('管理', null, [ 'style'=>"color:gray",'title' => '管理']);
                }
                },
            ]
        ],
        'emptyText'=>'此区还没有下级',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
   
</div>
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