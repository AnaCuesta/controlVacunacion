<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Establecimiento;
use frontend\models\EstablecimientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Zona;
use frontend\models\Distrito;
use frontend\models\Nombreestablecimiento;

/**
 * EstablecimientoController implements the CRUD actions for Establecimiento model.
 */
class EstablecimientoController extends Controller
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
     * Lists all Establecimiento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstablecimientoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Establecimiento model.
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
     * Devuelve todas las zonas
     *
     * @return mixed
     */
    public function actionListaDistritos($id)
    {

      $contarZonas  = ZONA::find()->where(['CODZONA'=> $id])->count();
      $distrito = Distrito::find()->where(['CODZONA'=> $id])->all();

      if($contarZonas > 0){
        echo "<option>Seleccione la opción..</option>";
        foreach ($distrito  as  $value) {
          echo "<option value='".$value->CODDISTRITO."'>".$value->DISTRITO."</option>";
        }
      }else {
        echo "<option></option>";
      }

    }
    /**
     * Devuelve todas los nombres de los establecimientos
     *
     * @return mixed
     */
    public function actionListaNombreEstablecimiento($id)
    {


      $contarNombreEstablecimiento  = Distrito::find()->where(['CODDISTRITO'=> $id])->count();
      $Nombreestablecimiento = Nombreestablecimiento::find()->where(['idDistrito'=> $id])->all();

      if($contarNombreEstablecimiento  > 0){

        foreach ($Nombreestablecimiento  as  $value) {
          echo "<option value='".$value->nombreEstalecimiento."'>".$value->nombreEstalecimiento."</option>";
        }
      }else {
          echo "<option>Seleccione la opción..</option>";
      }

    }

    /**
     * Creates a new Establecimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Establecimiento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UNICODIGOES]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Establecimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UNICODIGOES]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Establecimiento model.
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
     * Finds the Establecimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Establecimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Establecimiento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}