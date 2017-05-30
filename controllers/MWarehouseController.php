<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:00
 */
namespace backend\controllers;

use Yii;
use backend\models\MWarehouse;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\search\MWarehouseSearch;
use yii\web\NotFoundHttpException;
use backend\models\MCnArea;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;


class MWarehouseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /*
     * @inheritdoc
     */
    public function actionIndex()
    {  
        //ss是搜索传过来的判断条件
        if(!empty(Yii::$app->request->get('ss'))){
            $jj='';
            
               
                
            if($_POST['MCnArea']['city']==''||$_POST['MCnArea']['city']=='empty'){
                if($_POST['MCnArea']['province']!=''){
                    $jj=$_POST['MCnArea']['province'];
                    $jj=MCnArea::find()->where(['pid'=>$jj])->asArray()->all();
                    //$gm=[];
                    foreach ($jj as $key => $value) {
                        $gm[]=$value['id'];
                    }
                    //var_dump($gm);exit;
                     $query=MWarehouse::find()
                    ->where(['in','m_cn_areaid',$gm]);
                    
                }else{
                    $query=MWarehouse::find();
                }
            }else{
                $jj=$_POST['MCnArea']['city'];
                $query=MWarehouse::find()
                ->where(['m_cn_areaid'=>$jj]);
            }
            

          
                
                $searchModel = new MWarehouseSearch();
                $dataProvider = new ActiveDataProvider([
                    //dataProvider里面传参数需是对象
                    'query' => $query,
                ]);
            
        }else{
            $searchModel = new MWarehouseSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }
        return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MWarehouse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new MWarehouse();
        // var_dump(Yii::$app->request->post());
        // exit();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            var_dump($model->getFirstErrors());die();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                    'model' => $model
                ]
            );
        }

    }
    public function actionCity(){
        $a=MCnArea::findAll(array('id'=>Yii::$app->request->get('m_cn_areaid')));
        $b=ArrayHelper::map($a, 'id', 'pid');
        $model=new MCnArea();
         $c=MCnArea::find()->where(['id' =>$b[Yii::$app->request->get('m_cn_areaid')] ])->asArray()->one();
        // $name=\backend\models\MWarehouse::find()->where('m_cn_areaid=:m_cn_areaid',[':m_cn_areaid'=>$model->pid])->asArray()->all();
        //$orders = MWarehouse::find()->joinWith('m_cn_area')->where(['pid' => $b[Yii::$app->request->get('m_cn_areaid')]])->asArray()->all();
        
        $sql     = "select a.*,b.name as bname from m_warehouse as a left join m_cn_area as b on a.m_cn_areaid=b.id where b.pid=".$c['id'];
         
         $dataProvider = Yii::$app->db->createCommand($sql)->queryAll();


         
         
        return $this->render('city', array('yy' =>$dataProvider));
    }



    /**
     * Updates an existing MWarehouse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }




    /**
     * Deletes an existing MWarehouse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDel($id){
        if(Yii::$app->request->get('id')){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
    }
    /**
     * Finds the MWarehouse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MWarehouse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MWarehouse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}