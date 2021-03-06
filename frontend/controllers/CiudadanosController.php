<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Ciudadanos;
use frontend\models\CiudadanosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Provincia;
use frontend\models\Canton;
use frontend\models\Parroquia;
use frontend\models\Genero;
use yii\helpers\ArrayHelper;
use frontend\models\Nacionalidad;
/**
 * CiudadanosController implements the CRUD actions for Ciudadanos model.
 */
class CiudadanosController extends Controller
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
     * Lists all Ciudadanos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CiudadanosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ciudadanos model.
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
     * Creates a new Ciudadanos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ciudadanos();
        $provincia = new  Provincia();
        $canton = new  Canton();
        $parroquia = new  Parroquia();
        $genero = new  Genero();
        $nacionalidad = new  Nacionalidad();

        if ($model->load(Yii::$app->request->post())) {

          $provincia =  Provincia::find()->where(['CODPROVINCIA' => $model->PROVINCIA])->one();
          $canton =  Canton::find()->where(['CODCANTON' => $model->CANTON])->one();
          $parroquia =  Parroquia::find()->where(['CODPARROQUIA' => $model->PARROQUIA])->one();
          $genero =  Genero::find()->where(['CODSEXO' => $model->SEXO])->one();
          $nacionalidad =  Nacionalidad::find()->where(['CODNACIONALIDAD' => $model->NACIONALIDAD])->one();


          $model->PROVINCIA =  $provincia->PROVINCIA;
          $model->CANTON =  $canton->CANTON;
          $model->PARROQUIA = $parroquia->PARROQUIA;
          $model->SEXO = $genero->SEXO;
          $model->NACIONALIDAD = $nacionalidad->NACIONALIDAD;


          $model->save();

          return $this->redirect(['view', 'id' => $model->idCiudadano]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ciudadanos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $provincia = new  Provincia();
        $canton = new  Canton();
        $parroquia = new  Parroquia();
        $genero = new  Genero();
        $nacionalidad = new  Nacionalidad();

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

          $provincia =  Provincia::find()->where(['CODPROVINCIA' => $model->PROVINCIA])->one();
          $canton =  Canton::find()->where(['CODCANTON' => $model->CANTON])->one();
          $parroquia =  Parroquia::find()->where(['CODPARROQUIA' => $model->PARROQUIA])->one();
          $genero =  Genero::find()->where(['CODSEXO' => $model->SEXO])->one();
          $nacionalidad =  Nacionalidad::find()->where(['CODNACIONALIDAD' => $model->NACIONALIDAD])->one();


          $model->PROVINCIA =  $provincia->PROVINCIA;
          $model->CANTON =  $canton->CANTON;
          $model->PARROQUIA = $parroquia->PARROQUIA;
          $model->SEXO = $genero->SEXO;
          $model->NACIONALIDAD = $nacionalidad->NACIONALIDAD;

          $model->save();

          return $this->redirect(['view', 'id' => $model->idCiudadano]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ciudadanos model.
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
     * Finds the Ciudadanos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ciudadanos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ciudadanos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
