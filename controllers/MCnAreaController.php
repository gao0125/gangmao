<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:00
 */
namespace backend\controllers;

use Yii;
use backend\models\MCnArea;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\search\MCnAreaSearch;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\web\Response;
use yii\helpers\Html;

class MCnAreaController extends Controller
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

        $gid = Yii::$app->request->get('gid');
        if(!empty($gid)){
            //管理
            $query=MCnArea::find(['pid'=>$gid])
            ->where(['pid'=>$gid]);
            $searchModel = new MCnAreaSearch();
            $dataProvider = new ActiveDataProvider([
                //dataProvider里面传参数需是对象
                'query' => $query,
            ]);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }elseif(!empty(Yii::$app->request->get('ss'))){
            //$jj是要搜索的条件
            $jj='';
            if(!empty($_POST)){
                if($_POST['MCnArea']['area']==''||$_POST['MCnArea']['area']=='empty'){
                    if($_POST['MCnArea']['city']==''||$_POST['MCnArea']['city']=='empty'){
                        if($_POST['MCnArea']['province']!=''){
                            $jj=$_POST['MCnArea']['province'];
                        }
                    }else{
                        $jj=$_POST['MCnArea']['city'];
                    }
                }else{
                    $jj=$_POST['MCnArea']['area'];
                }
            }
            //搜索
            $query=MCnArea::find(['pid'=>$jj])
            ->where(['pid'=>$jj]);
            $searchModel = new MCnAreaSearch();
            $dataProvider = new ActiveDataProvider([
                //dataProvider里面传参数需是对象
                'query' => $query,
            ]);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            //无操作页面
             $query=MCnArea::find()->where(['level'=>1]);

            $searchModel = new MCnAreaSearch();
            $dataProvider = new ActiveDataProvider([
                //dataProvider里面传参数需是对象
                'query' => $query,
            ]);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }


    public function actionView($id)
    {
        //$pp=Yii::$app->db->createCommand('SELECT * FROM m_cn_area where pid='.$model->id)->queryAll();
        
        $query=MCnArea::find(['pid'=>$id])
        ->where(['pid'=>$id]);
        $dataProvider = new ActiveDataProvider([
            //dataProvider里面传参数需是对象
    'query' => $query,
]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MCnArea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate($aid=0,$typeid=1)
    {
        $model = new MCnArea();
        if ($model->load(Yii::$app->request->post())) {

            if ($model->save(false)){
                //$lastInsertID = $model->getPrimaryKey();
                return $this->redirect(['index']);
//                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                 var_dump($model->id);
            }
        } else {
            
            return $this->render('create', [
                    'model' => $model
                ]
            );
        }

    }

    public function actionAjax(){
        ////
            $aid = (int)Yii::$app->request->get('aid');
            //$typeid = (int)Yii::$app->request->get('typeid');
            $model  = new MCnArea();
            $model->getCityList($aid);
             
                $ooi=$model->getCityList($aid);
                $vv='';
                foreach ($ooi as $key => $value) {
                    $vv.= "<option value='".$key."'>".$value."</option>";
                }
                return $vv;
        
    }
    //三级联动
    public function actionSite($pid, $typeid = 0)
    {
        $model = new MCnArea();
        $model = $model->getCityList($pid);

        if($typeid == 1){$aa="--请选择市--";}else if($typeid == 2 && $model){$aa="--请选择区--";}

        echo Html::tag('option',$aa, ['value'=>'empty']) ;

        foreach($model as $value=>$name)
        {
            echo Html::tag('option',Html::encode($name),array('value'=>$value));
        }
    }
    

    /**
     * Updates an existing MCnArea model.
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
     * Deletes an existing MCnArea model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
     //    $rows=Yii::$app->db->createCommand($sql)->queryOne();
    	// $sql= "SELECT * FROM m_cn_area where pid=".$id;  
        // var_dump($rows);
        
        // var_dump($count);exit();

        // if(empty($count)){
            
        	

        //  return $this->redirect(Yii::$app->request->referrer);
        // }else{
        //     //当下一级没有数据，可删除本级
        //  	$this->findModel($id)->delete();

        //  return $this->redirect(Yii::$app->request->referrer);
        	
        // }
        try{
            //查询下级有没有数据
            $id=Yii::$app->request->get('id');
            if(empty($id)){
                throw new \Exception("参数错误");
            }
           $count=MCnArea::find()->andWhere(['pid'=>$id])->one();
           //var_dump($is_del);exit();
            if(!empty($count)){
                //throw new \Exception("该订单有详情单，请删除详情后再删除此单");
                Yii::$app->session->setFlash('info','此区域有下级区域，不能删除');

            }else{
                if($this->findModel($id)->delete()){


                    Yii::$app->session->setFlash('info','删除成功');
                
                }
            }
            
        }catch(\Execption $e){
            Yii::$app->session->setFlash('info',$e->getMessage());
           
            
        }
        return $this->redirect(Yii::$app->request->referrer);
    }


    /**
     * Finds the MCnArea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MCnArea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MCnArea::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}