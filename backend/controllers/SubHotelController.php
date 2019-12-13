<?php

namespace backend\controllers;

use backend\models\HotelTag;
use Yii;
use backend\models\SubHotel;
use backend\models\SubHotelSearch;
use yii\base\ErrorException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * SubHotelController implements the CRUD actions for SubHotel model.
 */
class SubHotelController extends Controller
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
     * Lists all SubHotel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubHotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSendMail()
    {
        $this->on(SendMailController::SEND_MAIL,['backend\components\mail\Mail','sendMail']);
        $mailer=new SendMailController;
        $mailer->send();
    }

    /**
     * Displays a single SubHotel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SubHotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubHotel();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $transaction =Yii::$app->db->beginTransaction();
            try{
                $model->save(false);
                $subHotelId=$model->sub_hotel_id;
                $data=[];
                foreach ($model->tag as $key => $tagId){
                    $data[]=[$subHotelId,$tagId];
                }
                $hotelTag=new HotelTag;
                $attributes=['sub_hotel_id','tag_id'];
                $tableName=$hotelTag::tableName();
                $db=$hotelTag::getDb();
                $db->createCommand()->batchInsert($tableName,$attributes,$data)->execute();
                $transaction->commit();
                return $this->redirect(['index']);
            }catch (ErrorException $e){
                $transaction->rollBack();
                throw $e;
            }
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SubHotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $transaction=Yii::$app->db->beginTransaction();
            try{
                $model->save(false);
                $subHotelId=$model->sub_hotel_id;
                $data=[];
                foreach ($model->tag as $key => $tagId){
                    $data[]=[$subHotelId,$tagId];
                }
                $hotelTag=new HotelTag;
                $attributes=['sub_hotel_id','tag_id'];
                $tableName=$hotelTag::tableName();
                $db=$hotelTag::getDb();
                $db->createCommand()->delete($tableName,'sub_hotel_id='.$subHotelId)->execute();
                $db->createCommand()->batchInsert($tableName,$attributes,$data)->execute();
                $transaction->commit();
            }catch (ErrorException $e){
                $transaction->rollBack();
                throw $e;
            }
            return $this->redirect(['update','id'=>$subHotelId]);
        }else{
            $model->tag=HotelTag::getTagBySubHotel($id);
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SubHotel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SubHotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubHotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubHotel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
