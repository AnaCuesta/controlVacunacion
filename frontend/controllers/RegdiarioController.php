<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Regdiario;
use frontend\models\RegdiarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use frontend\models\Establecimiento;
use frontend\models\Canton;
use frontend\models\Provincia;
use frontend\models\ZonaUbic;
use frontend\models\Parroquia;
/**
 * RegdiarioController implements the CRUD actions for Regdiario model.
 */
class RegdiarioController extends Controller
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
    /*

          $canton;
          $zona;
          $parroquia;
          $distrito;
          $zonaUbicacion;
          $uniCodigo;
          $tipoEstablecimiento;
          $localidad;

    */

     /**
       *  Obtiene el nombre de la zona
       * @return mixed
       */
      public function actionZona($id)
      {
          $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
          echo Json::encode($establecimiento->ZONA);
      }

      /**
         *  Obtiene el nombre de la zona
         * @return mixed
         */
        public function actionDistrito($id)
        {
            $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
            echo Json::encode($establecimiento->DISTRITO);
        }
        /**
         *  Obtiene el nombre de la zona
         * @return mixed
         */
        public function actionCanton($id)
        {
            $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
            $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $establecimiento->CODPARROQUIA])->one();
            $canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
            echo Json::encode($canton->CANTON);
        }

       /**
         *  Obtiene el nombre de la zona
         * @return mixed
         */
        public function actionProvincia($id)
        {
          $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
          $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $establecimiento->CODPARROQUIA])->one();
          $canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
          $provincia = Provincia::find()->where(['CODPROVINCIA' => $canton->CODPROVINCIA])->one();
          echo Json::encode($provincia->PROVINCIA);
        }

       /**
         *  Obtiene el nombre de la zona
         * @return mixed
         */
        public function actionParroquia($id)
        {
          $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
          $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $establecimiento->CODPARROQUIA])->one();
          echo Json::encode($parroquia->PARROQUIA);
        }

        /**
           *  Obtiene el nombre de la zona
           * @return mixed
           */
          public function actionTipoEstablecimiento($id)
          {
            $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
            echo Json::encode($establecimiento->TIPOESTABLECIMIENTO);
          }
        /**
           *  Obtiene el nombre de la zona
           * @return mixed
           */
          public function actionZonaUbicacion($id)
          {
            $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
            $zona = ZonaUbic::find()->where(['CODZONAUBIC' => $establecimiento->CODZONAUBIC])->one();
            echo Json::encode($zona->ZONAUBICACION);
          }
        /**
           *  Obtiene el nombre de la zona
           * @return mixed
           */
          public function actionLocalidad($id)
          {
            $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
            echo Json::encode($establecimiento->LOCALIDADEST);
          }
        /**
           *  Obtiene el nombre de la zona
           * @return mixed
           */
          public function actionUniCodigo($id)
          {
            $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
            echo Json::encode($establecimiento->UNICODIGOES);
          }


    /**
     * Lists all Regdiario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegdiarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Regdiario model.
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
     * Creates a new Regdiario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Regdiario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CODREGISTRODIARIO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Regdiario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CODREGISTRODIARIO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Regdiario model.
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
     * Finds the Regdiario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Regdiario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Regdiario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
