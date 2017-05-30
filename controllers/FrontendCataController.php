<?php

namespace backend\controllers;

use Yii;
use backend\models\FrontendCata;
use backend\models\search\FrontendCataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * FrontendCataController implements the CRUD actions for FrontendCata model.
 */
class FrontendCataController extends Controller
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
     * Lists all FrontendCata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendCataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGetSubCata($id)
    {
        $items = \common\services\Cata::getSubCat($id);
        return json_encode($items);
    }

    /**
     * Displays a single FrontendCata model.
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
     * Creates a new FrontendCata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FrontendCata();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->ico = UploadedFile::getInstance($model, 'ico');

            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/cata/' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $fileName ='FC_'.$arr.'.' . $model->ico->extension;
                $isSave = $isDirExist ? $model->ico->saveAs($dir . '/' . $fileName) : '';
                $model->ico = $isSave ? 'files/cata/'. $fileName : 'no_image.jpg';
            }
        }
//        $model->load(Yii::$app->request->post());
        $model->depth = 0;
        if ( Yii::$app->request->isPost && $model->save()) {
            $pid = isset($_POST['FrontendCata']['pid']) ? $_POST['FrontendCata']['pid'] : 0;

            if($pid){
                $parentModel = $this->findModel($pid);
                $route = $parentModel->route;
            } else {
                $route = '0';
            }
            $model->route = $route . ',' . $model->id;
            $model->depth = count(explode(',', $model->route)) - 2;

            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
            else
                $model->delete ();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FrontendCata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->ico = UploadedFile::getInstance($model, 'ico');

            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/cata/'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(10000000,99999999);
                $fileName = 'FC_'.$arr.'.' . $model->ico->extension;
                $isSave =  $isDirExist ? $model->ico->saveAs($dir . '/' . $fileName) : '';
                $model->ico  = $isSave ? 'files/cata/'.$fileName : 'no_image.jpg';
            }
//            var_dump(Yii::$app->request->post());die();
        }




        $pid = isset($_POST['FrontendCata']['pid']) ? $_POST['FrontendCata']['pid'] : 0;
        if($pid == $model->id){
            $model->name = isset($_POST['FrontendCata']['name']) ? $_POST['FrontendCata']['name'] : '';
        }else{
            $model->load(Yii::$app->request->post());
        }

        //$model->depth = 0;

        if ( Yii::$app->request->isPost && $model->save()) {

            if($pid != $model->id){
                if($pid){
                    $parentModel = $this->findModel($pid);
                    $route = $parentModel->route;
                } else {
                    $route = '0';
                }
                $model->route = $route . ',' . $model->id;
                $model->depth = count(explode(',', $model->route)) - 2;
            }
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FrontendCata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FrontendCata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return FrontendCata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendCata::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
