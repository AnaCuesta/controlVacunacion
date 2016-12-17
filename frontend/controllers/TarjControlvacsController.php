<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TarjControlvacs;
use frontend\models\TarjControlvacsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Establecimiento;
use frontend\models\Zona;
use frontend\models\Canton;
use frontend\models\Distrito;
use frontend\models\Provincia;
use frontend\models\Ciudadanos;
use yii\helpers\Json;
/**
 * TarjControlvacsController implements the CRUD actions for TarjControlvacs model.
 */
class TarjControlvacsController extends Controller
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
     * Lists all TarjControlvacs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TarjControlvacsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TarjControlvacs model.
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
     * Creates a new TarjControlvacs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TarjControlvacs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CODTARCONTVAC]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**    
     *  Obtiene el nombre de la zona 
     * @return mixed
     */
    public function actionListadoZona($id)
    {
        $id = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
        $zona = Zona::find()->where(['CODZONA' => $id->CODZONA])->one();
        echo Json::encode($zona->ZONA);
    }
    /**    
     *  Obtiene el nombre del distrito
     * @return mixed
     */
    public function actionListadoDistrito($id)
    {
        $id = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
        $distrito = Distrito::find()->where(['CODDISTRITO' => $id->CODDISTRITO])->one();
        echo Json::encode($distrito->DISTRITO);
    }
   /**    
     *  Obtiene el nombre de la provincia
     * @return mixed
     */
    public function actionListadoProvincia($id)
    {
        $id = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
        $provincia = Provincia::find()->where(['CODPROVINCIA' => $id->CODPROVINCIA])->one();
        echo Json::encode($provincia->PROVINCIA);
    }  
    /**    
     *  Obtiene el nombre de la Canton
     * @return mixed
     */
    public function actionListadoCanton($id)
    {
        $id = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
        $canton = Canton::find()->where(['CODCANTON' => $id->CODCANTON])->one();
        echo Json::encode($canton->CANTON);
    } 

     /**    
     *  Obtiene el los datos del Ciudadano
     * @return mixed
     */
    public function actionListadoCiudadano($id)
    {
        $id = Ciudadanos::find()->where(['idCiudadano' => $id])->one();
       
        echo Json::encode($id);
    }







    /**
     * Updates an existing TarjControlvacs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CODTARCONTVAC]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TarjControlvacs model.
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
     * Finds the TarjControlvacs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TarjControlvacs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TarjControlvacs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
