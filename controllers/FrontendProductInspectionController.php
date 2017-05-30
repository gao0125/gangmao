<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 18:40
 */
namespace backend\controllers;

use Yii;
use backend\models\FrontendProductInspection;
use backend\models\FrontendProductInspectionDetail;
use backend\models\search\FrontendProductInspectionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\data\ActiveDataProvider;

/**
 * FrontendProductInspectionController implements the CRUD actions for FrontendProductInspection model.
 */
class FrontendProductInspectionController extends Controller
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

    /**
     * Lists all FrontendProductInspection models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new FrontendProductInspectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new FrontendProductInspection();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                    'model' => $model
                ]
            );
        }

    }

    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionUpdate($id)
    {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
       
    }





    /**
     * Deletes an existing FrontendProductInspection model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        // $is_del=FrontendProductInspectionDetail::find()->where(['product_inspectionid'=>$id])->count();
        // if(empty($is_del)){
        //     $this->findModel($id)->delete();
        // }
        try{
            //查询下级有没有数据
            $id=Yii::$app->request->get('id');
            if(empty($id)){
                throw new \Exception("参数错误");
            }
           $is_del=FrontendProductInspectionDetail::find()->where(['product_inspectionid'=>$id])->one();
           //var_dump($is_del);exit();
            if(!empty($is_del)){
                //throw new \Exception("该订单有详情单，请删除详情后再删除此单");
                Yii::$app->session->setFlash('info','该订单有详情单，请删除详情后再删除此单');

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
     * Finds the FrontendProductInspection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendProductInspection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendProductInspection::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}