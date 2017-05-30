<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use backend\models\FrontendSubject;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendSubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '社区话题分类';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
if(Yii::$app->session->hasFlash('info')){
    echo "<div style='color:red;font-size:20px;text-align:center'>";
    echo Yii::$app->session->getFlash('info');
    echo "</div>";
}
?>
<div class="frontend-subject-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field(new FrontendSubject(), 'name')->dropDownList(\common\services\Subject::getDropdownList()) ?>
    <?php ActiveForm::end(); ?>

    <?php 
        // $subjectList = \backend\models\FrontendSubject::find()->select('id,name')->asArray()->all();
        // $val=array(''=>'全部');
        // foreach ($subjectList as $key => $value) {
        //     $val[$value['id']]=$value['name'];
        // }
        //var_dump($val);exit();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
//            'pid',
            [
            'attribute' => 'name',
            'value'=>
             function($model){
                  return $model->name;
                },
            // 'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'name', 
            //               $val  , ['class' => 'form-control']),
                //                  ,//\backend\models\FrontendProduct::$isRecommendation,     //此处我们可以将筛选项组合成key-value形式
                'headerOptions' => ['width' => '120']
            ],
            'desc',
            [
                'attribute'=>'ico',
                'format' =>['image',['width'=>'150','height'=>'100']],
                'value'=>function($model){
                    return '/'.$model->ico;
                }
            ],
            [
                'attribute'=>'created_by',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\User::find()->select('username')->where('id=:created_by',[':created_by'=>$model->created_by])->asArray()->one();
                    return $name['username'];
                },
                
            ],
            'updated_by'=>[
                'attribute'=>'updated_by',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\User::find()->select('username')->where('id=:updated_by',[':updated_by'=>$model->updated_by])->asArray()->one();
                    return $name['username'];
                },
                
            ],


            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70'],
                'template'=>'{update}{delete}',
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'delete' => function ($url, $model, $key) {
                        if(\backend\models\FrontendSubject::find()->where(['pid'=>$model->id])->one()){
                            
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
                'label'=>'管理',
                'format'=>'raw',
                'value' => function($data){
                    
                    if(\backend\models\FrontendSubject::find()->where(['pid'=>$data->id])->one()){
                        $url = \yii\helpers\Url::to(['frontend-subject/index', 'sub_id' => $data->id]);
                    return Html::a('管理', $url, ['title' => '管理']);
                }else{
                    return Html::a('管理', null, [ 'style'=>"color:gray",'title' => '管理']);
                }
                }
            ],
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>