<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:00
 */
namespace backend\controllers;
use Yii;
use backend\models\FrontendNews;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\search\FrontendNewsSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;


class FrontendNewsController extends Controller{
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
        $searchModel = new FrontendNewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FrontendNews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new FrontendNews();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->ico = UploadedFile::getInstance($model, 'ico');
            //$model->video = UploadedFile::getInstance($model, 'video');

            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/news/ico/' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $fileName ='new_ico_'.$arr.'.' . $model->ico->extension;
                $isSave = $isDirExist ? $model->ico->saveAs($dir . '/' . $fileName) : '';
                $model->ico = $isSave ? 'files/news/ico/'.$model->id .'/'.$fileName : 'no_image.jpg';
            }
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
     * Updates an existing FrontendNews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->ico = UploadedFile::getInstance($model, 'ico');

            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/news/ico/' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $fileName ='new_ico_'.$arr.'.' . $model->ico->extension;
                $isSave = $isDirExist ? $model->ico->saveAs($dir . '/' . $fileName) : '';
                $model->ico = $isSave ? 'files/news/ico/'.$model->id .'/'.$fileName : 'no_image.jpg';
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
     * Deletes an existing FrontendNews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
    public function actionDelete($id)
    {
        $model =new FrontendNews();
        if($model->deleteAll("id in($id)")){
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the FrontendNews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendNews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendNews::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}