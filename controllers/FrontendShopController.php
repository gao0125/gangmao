<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 18:40
 */
namespace backend\controllers;

use Yii;
use backend\models\FrontendShop;
use backend\models\search\FrontendShopSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * FrontendShopController implements the CRUD actions for FrontendShop model.
 */
class FrontendShopController extends Controller
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
     * Lists all FrontendShop models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendShopSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new FrontendShop();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->logo = UploadedFile::getInstance($model, 'logo');
            $model->banner = UploadedFile::getInstance($model, 'banner');
            //var_dump ($model->errors);die();
            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/shop/' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $array = rand(100000000,999999999);
                $fileName ='FS_'.$arr.'.' . $model->logo->extension;
                $lastName ='FS_'.$array.'.' . $model->banner->extension;
                $isSave = $isDirExist ? $model->logo->saveAs($dir . '/' . $fileName) : '';
                $IsSave = $isDirExist ? $model->banner->saveAs($dir . '/' . $lastName) : '';
                $model->logo = $isSave ? 'files/shop/'.$model->id .'/'.$fileName : 'no_image.jpg';
                $model->banner = $IsSave ? 'files/shop/'.$model->id .'/'.$lastName : 'no_image.jpg';
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
        $data['logo']= $model->logo;$data['banner']= $model->banner;

//var_dump($model);die();
        if(Yii::$app->request->isPost){

//            var_dump($model->logo);
//            var_dump($model->banner);

            $model->load(Yii::$app->request->post());
            $logo = $model->logo = UploadedFile::getInstance($model, 'logo');
            $banner = $model->banner = UploadedFile::getInstance($model, 'banner');
            if (!$model->banner){
                $model->banner = $data['banner'];
            }
            if (!$model->logo){
                $model->logo = $data['logo'];
            }

            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/shop/' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $array = rand(100000000,999999999);
                if (!empty($logo)){
                    $model->logo = UploadedFile::getInstance($model, 'logo');
                    $fileName ='FS_'.$arr.'.' . $model->logo->extension;
                    $isSave = $isDirExist ? $model->logo->saveAs($dir . '/' . $fileName) : '';
                    $model->logo = $isSave ? 'files/shop/'.$model->id .'/'.$fileName : 'no_image.jpg';

                }
                if (!empty($banner)){
                    $model->banner = UploadedFile::getInstance($model, 'banner');
                    $lastName ='FS_'.$array.'.' . $model->banner->extension;
                    $IsSave = $isDirExist ? $model->banner->saveAs($dir . '/' . $lastName) : '';
                    $model->banner = $IsSave ? 'files/shop/'.$model->id .'/'.$lastName : 'no_image.jpg';

                }


            }


//            var_dump(Yii::$app->request->post());die();
//var_dump($model);die();

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
     * Deletes an existing FrontendShop model.
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
     * Finds the FrontendShop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendShop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendShop::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}