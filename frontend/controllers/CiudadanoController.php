<?php
namespace frontend\controllers;
use Yii;
use frontend\models\Ciudadano;
use frontend\models\Localidad;
use frontend\models\Parroquia;
use frontend\models\Canton;
use frontend\models\Provincia;
use frontend\models\CiudadanoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * CiudadanoController implements the CRUD actions for Ciudadano model.
 */
class CiudadanoController extends Controller
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
     * Lists all Ciudadano models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CiudadanoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Ciudadano model.
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
     * Creates a new Ciudadano model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ciudadano();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->N_HISTCLINIC]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Ciudadano model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->N_HISTCLINIC]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Ciudadano model.
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
     * Deletes an existing Ciudadano model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionLugarResidencia($id)
    {
      $localidad = Localidad::find()->where(['CODLOCREC' => $id])->one();
      echo Json::encode($localidad->LOCALREC);
    }
    /**
     * Deletes an existing Ciudadano model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionParroquia($id)
    {
      $localidad = Localidad::find()->where(['CODLOCREC' => $id])->one();
      $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $localidad->CODPARROQUIA])->one();
      echo Json::encode($parroquia->PARROQUIA);
    }
    /**
     * Deletes an existing Ciudadano model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionCanton($id)
    {
      $localidad = Localidad::find()->where(['CODLOCREC' => $id])->one();
      $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $localidad->CODPARROQUIA])->one();
      $canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
      echo Json::encode($canton->CANTON);
    }
    /**
     * Deletes an existing Ciudadano model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionProvincia($id)
    {
      $localidad = Localidad::find()->where(['CODLOCREC' => $id])->one();
      $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $localidad->CODPARROQUIA])->one();
      $canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
      $provincia = Provincia::find()->where(['CODPROVINCIA' => $canton->CODPROVINCIA])->one();
      echo Json::encode($provincia->PROVINCIA);
    }
    /**
     * Finds the Ciudadano model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Ciudadano the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ciudadano::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
