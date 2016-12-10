<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Canton;
use frontend\models\Parroquia;
use frontend\models\ProvinciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProvinciaController implements the CRUD actions for Provincia model.
 */
class ProvinciaController extends Controller
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
     * Lists all Provincia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProvinciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     *
     *
     * Devuelve todos los registros de los cantones
     *
     **/
    public function actionListaCantones($id)
    {

      $contarCantones  = Canton::find()->where(['CODPROVINCIA'=> $id])->count();
      $cantones = Canton::find()->where(['CODPROVINCIA'=> $id])->all();

      if($contarCantones > 0){
        echo "<option>Seleccione la opción..</option>";
        foreach ($cantones as  $value) {
          echo "<option value='".$value->CODCANTON."'>".$value->CANTON."</option>";
        }
      }else {
        echo "<option></option>";
      }

    }
    /**
     *
     *
     * Devuelve todos los registros de las Parroquias
     *
     **/
    public function actionListaParroquia($id)
    {


      $contarParroquia  = PARROQUIA::find()->where(['CODCANTON'=> $id])->count();
      $parroquia = PARROQUIA::find()->where(['CODCANTON'=> $id])->all();

      if($contarParroquia > 0){
        echo "<option>Seleccione la opción..</option>";
        foreach ($parroquia as  $value) {

          echo "<option value='".$value->CODPARROQUIA."'>".$value->PARROQUIA."</option>";
        }
      }else {
        echo "<option></option>";
      }

    }

    /**
     * Displays a single Provincia model.
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
     * Creates a new Provincia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Provincia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CODPROVINCIA]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Provincia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CODPROVINCIA]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Provincia model.
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
     * Finds the Provincia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Provincia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Provincia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
