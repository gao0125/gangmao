<?php

namespace backend\controllers;

use Yii;
use backend\models\FrontendSubject;
use backend\models\search\FrontendSubjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * FrontendSubjectController implements the CRUD actions for FrontendSubject model.
 */
class FrontendSubjectController extends Controller
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
     * Lists all FrontendSubject models.
     * @return mixed
     */
    public function actionIndex()
    {
       if(Yii::$app->request->get('sub_id')){
            $query=FrontendSubject::find()->where(['pid'=>Yii::$app->request->get('sub_id')]);
            $searchModel = new FrontendSubjectSearch();
            $dataProvider = new ActiveDataProvider([
                //dataProvider里面传参数需是对象
                'query' => $query,
            ]);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
           $query=FrontendSubject::find()->where(['pid'=>0]);
            $searchModel = new FrontendSubjectSearch();
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

    /**
     * Displays a single FrontendSubject model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FrontendSubject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FrontendSubject();        
        $model->load(Yii::$app->request->post());
        $model->depth = 0;

        if ( Yii::$app->request->isPost && $model->save()) {  
            $pid = isset($_POST['FrontendSubject']['pid']) ? $_POST['FrontendSubject']['pid'] : 0;
         
            if($pid){
               $parentModel = $this->findModel($pid);
               $route = $parentModel->route;
            } else {
                $route = '0';
            }           
            $model->route = $route . ',' . $model->id;
            $model->depth = count(explode(',', $model->route)) - 2;
                    
            if($model->save())
                return $this->redirect(['index']);
            else
                $model->delete ();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FrontendSubject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
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
     * Deletes an existing FrontendSubject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        try{
            $pid=FrontendSubject::find()->where(['pid'=>$id])->one();
            if($pid){
                Yii::$app->session->setFlash('info','该类有分支，不能删除');
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
     * Finds the FrontendSubject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return FrontendSubject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendSubject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
