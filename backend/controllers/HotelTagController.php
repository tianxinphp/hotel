<?php

namespace backend\controllers;

use Yii;
use backend\models\HotelTag;
use backend\models\HotelTagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HotelTagController implements the CRUD actions for HotelTag model.
 */
class HotelTagController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all HotelTag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HotelTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HotelTag model.
     * @param integer $sub_hotel_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sub_hotel_id, $tag_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sub_hotel_id, $tag_id),
        ]);
    }

    /**
     * Creates a new HotelTag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HotelTag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sub_hotel_id' => $model->sub_hotel_id, 'tag_id' => $model->tag_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HotelTag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $sub_hotel_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sub_hotel_id, $tag_id)
    {
        $model = $this->findModel($sub_hotel_id, $tag_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sub_hotel_id' => $model->sub_hotel_id, 'tag_id' => $model->tag_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HotelTag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $sub_hotel_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sub_hotel_id, $tag_id)
    {
        $this->findModel($sub_hotel_id, $tag_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HotelTag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $sub_hotel_id
     * @param integer $tag_id
     * @return HotelTag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sub_hotel_id, $tag_id)
    {
        if (($model = HotelTag::findOne(['sub_hotel_id' => $sub_hotel_id, 'tag_id' => $tag_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
