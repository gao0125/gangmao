<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 18:40
 */
namespace backend\controllers;

use Yii;
use backend\models\FrontendProductImg;
use backend\models\search\FrontendProductImgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * FrontendProductImgController implements the CRUD actions for FrontendProductImg model.
 */
class FrontendProductImgController extends Controller
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
     * Lists all FrontendProductImg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendProductImgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new FrontendProductImg();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->location = UploadedFile::getInstance($model, 'location');
            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/product-img/' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $fileName ='PI_'.$arr.'.' . $model->location->extension;
                $isSave = $isDirExist ? $model->location->saveAs($dir . '/' . $fileName) : '';
                $model->location = $isSave ? 'files/product-img/'.$fileName : 'no_image.jpg';
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

    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->location = UploadedFile::getInstance($model, 'location');

            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/product-img/'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(100000000,999999999);
                $fileName = 'FPI_'.$arr.'.' . $model->location->extension;
                $isSave =  $isDirExist ? $model->location->saveAs($dir . '/' . $fileName) : '';
                $model->location  = $isSave ? 'files/product-img/'.$fileName : 'no_image.jpg';
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
     * Deletes an existing FrontendProductImg model.
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
     * Finds the FrontendProductImg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendProductImg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendProductImg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}