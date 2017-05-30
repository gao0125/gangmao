<?php

namespace backend\controllers;

use Yii;
use backend\models\FrontendProduct;
use backend\models\search\FrontendProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper; //'yii\helpers\FileHelper

/**
 * FrontendProductController implements the CRUD actions for FrontendProduct model.
 */
class FrontendProductController extends Controller
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
     * Lists all FrontendProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FrontendProduct model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FrontendProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FrontendProduct();
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->f_imgurl = UploadedFile::getInstance($model, 'f_imgurl');
       
            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/product/'.$model->cataid;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump( $model->f_imgurl );
//                die();
                if(! empty( $model->f_imgurl)){
                 //   $arr = rand(10000000,99999999);
                    $fileName = 'P_'.$model->code.'.' . $model->f_imgurl->extension;
                    $isSave =  $isDirExist ? $model->f_imgurl->saveAs($dir . '/' . $fileName) : '';
                    $model->imgurl  = $isSave ?  'files/product/' . $fileName : 'no_image.jpg';
                }else{
                    $model->imgurl  = 'no_image.jpg';
                }
             }
//            var_dump(Yii::$app->request->post());die();
        }
        
        if (Yii::$app->request->isPost && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FrontendProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->f_imgurl = UploadedFile::getInstance($model, 'f_imgurl');

            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/product/'.$model->cataid;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
//                     var_dump( $model->f_imgurl );
//                die();
                if(! empty( $model->f_imgurl)){
                 //   $arr = rand(10000000,99999999);
                    $fileName = 'P_'.$model->code.'.' . $model->f_imgurl->extension;
                    $isSave =  $isDirExist ? $model->f_imgurl->saveAs($dir . '/' . $fileName) : '';
                    $model->imgurl  = $isSave ?  'files/product/' . $fileName : 'no_image.jpg';
                }
            }
//            var_dump(Yii::$app->request->post());die();
        }

        if (Yii::$app->request->isPost && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FrontendProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FrontendProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
