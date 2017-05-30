<?php

namespace backend\controllers;

use Yii;
use backend\models\FrontendProductDesc;
use backend\models\search\FrontendProductDesc as FrontendProductDescSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FrontendProductDescController implements the CRUD actions for FrontendProductDesc model.
 */
class FrontendProductDescController extends Controller
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
     * Lists all FrontendProductDesc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendProductDescSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $frontendProductDesc = Yii::$app->request->get('FrontendProductDesc');
        $productid = isset($frontendProductDesc['productid']) ? $frontendProductDesc['productid'] : 0;
        $product = \backend\models\FrontendProduct::findOne($productid);
        if(empty($product)){            
            return '不可对空产品增加';
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'productid' => $frontendProductDesc['productid']
        ]);
    }

    /**
     * Displays a single FrontendProductDesc model.
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
     * Creates a new FrontendProductDesc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($productid)
    {//echo (Yii::getAlias('@webroot/files/product/desc'));die();
        $model = new FrontendProductDesc();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'productid' => $productid,
            ]);
        }
    }

    /**
     * Updates an existing FrontendProductDesc model.
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
     * Deletes an existing FrontendProductDesc model.
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
     * Finds the FrontendProductDesc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendProductDesc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendProductDesc::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
