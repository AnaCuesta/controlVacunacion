<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TarjControlvac;
use frontend\models\Establecimiento;
use frontend\models\Canton;
use frontend\models\Provincia;
use frontend\models\Parroquia;
use frontend\models\Ciudadano;
use frontend\models\Nacionalidad;
use frontend\models\Autoidetnica;
use frontend\models\Lugarresidencia;
use frontend\models\Localidad;
use frontend\models\TarjControlvacSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use frontend\models\Calendariovacunacion;
use frontend\models\Vacuna;
use frontend\models\Dosis;
/**
 * TarjControlvacController implements the CRUD actions for TarjControlvac model.
 */
class TarjControlvacController extends Controller
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
      *  Lista las dosis
      * @return mixed
      */
     public function actionListadoDosis($id)
     {


       $contarVacuna  = Vacuna::find()->where(['CODVACUNA'=> $id])->count();
       $dosis = Dosis::find()->where(['CODVACUNA'=> $id])->all();


       if($contarVacuna > 0){
         echo "<option>Seleccione la opción..</option>";
         foreach ($dosis  as  $value) {
           echo "<option value='".$value->CODDOSIS."'>".$value->DOSIS."</option>";
         }
       }else {
         echo "<option></option>";
       }

     }

    /*Establecimiento*/

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
        /*Establecimiento*/



         /*ciudadano*/


         /**
            *  Obtiene el nombre de la zona
            * @return mixed
            */
           public function actionNombreCiudadano($id)
           {
             $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();

             if( count($ciudadano) > 0){

               echo Json::encode($ciudadano->NOMBRES);

             }else {
                echo Json::encode('');
             }

           }
         /**
            *  Obtiene el nombre de la zona
            * @return mixed
            */
           public function actionApellidoCiudadano($id)
           {
             $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();

             if( count($ciudadano) > 0){

                 echo Json::encode($ciudadano->APELLIDOS);

             }else {
                echo Json::encode('');
             }


           }
         /**
            *  Obtiene el nombre de la zona
            * @return mixed
            */
           public function actionNacionalidadCiudadano($id)
           {

             if(!empty($id)){

                $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                $nacionlidad = Nacionalidad::find()->where(['CODNACIONALIDAD' =>$ciudadano->CODNACIONALIDAD])->one();

                echo Json::encode($nacionlidad->NACIONALIDAD);

             }else {

                echo Json::encode('');
             }

           }
         /**
            *  Obtiene el nombre de la zona
            * @return mixed
            */
           public function actionEtniaCiudadano($id)
           {

             if(!empty($id)){

                $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                $etnia = Autoidetnica::find()->where(['CODAUTOIDETNICA' =>$ciudadano->CODAUTOIDETNICA])->one();

                echo Json::encode($etnia->AUTOIDETNICA);

             }else {

                echo Json::encode('');
             }

           }
         /**
            *  Obtiene el nombre de la zona
            * @return mixed
            */
           public function actionLugarResidenciaCiudadano($id)
           {

             if(!empty($id)){

                $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                $lugar = Lugarresidencia::find()->where(['CODLUGARRESIDE' =>$ciudadano->CODLUGARRESIDE])->one();

                echo Json::encode($lugar->LUGARRESIDENCIA);

             }else {

                echo Json::encode('');
             }

           }
         /**
            *  Obtiene el nombre de la zona
            * @return mixed
            */
           public function actionProvinciaCiudadano($id)
           {

             if(!empty($id)){

                $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                $localidad = Localidad::find()->where(['CODLOCREC' => $ciudadano->CODLUGARRESIDE])->one();
                $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $localidad->CODPARROQUIA])->one();
                $canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
                $provincia = Provincia::find()->where(['CODPROVINCIA' => $canton->CODPROVINCIA])->one();

                echo Json::encode($provincia->PROVINCIA);

             }else {

                echo Json::encode('');
             }

           }
         /**
            *  Obtiene el nombre de la zona
            * @return mixed
            */
           public function actionCantonCiudadano($id)
           {

             if(!empty($id)){

                $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                $localidad = Localidad::find()->where(['CODLOCREC' => $ciudadano->CODLUGARRESIDE])->one();
                $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $localidad->CODPARROQUIA])->one();
                $canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();

                echo Json::encode($canton->CANTON);

             }else {

                echo Json::encode('');
             }

           }
         /**
            *  Obtiene el nombre de la zona
            * @return mixed
            */
           public function actionParroquiaCiudadano($id)
           {

             if(!empty($id)){

                $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                $localidad = Localidad::find()->where(['CODLOCREC' => $ciudadano->CODLUGARRESIDE])->one();
                $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $localidad->CODPARROQUIA])->one();

                echo Json::encode($parroquia->PARROQUIA);

             }else {

                echo Json::encode('');
             }

           }

           /**
              *  Obtiene el nombre de la zona
              * @return mixed
              */
             public function actionLocalidadCiudadano($id)
             {

               if(!empty($id)){

                  $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                  $localidad = Localidad::find()->where(['CODLOCREC' => $ciudadano->CODLUGARRESIDE])->one();
                  echo Json::encode($localidad->LOCALREC);

               }else {

                  echo Json::encode('');
               }

             }

             /**
                *  Obtiene el nombre de la zona
                * @return mixed
                */
               public function actionDireccionCiudadano($id)
               {
                 $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();

                 if( count($ciudadano) > 0){

                     echo Json::encode($ciudadano->DIRCIUD);

                 }else {
                    echo Json::encode('');
                 }


               }
               /**
                  *  Obtiene el nombre de la zona
                  * @return mixed
                  */
                 public function actionTelefonoCiudadano($id)
                 {
                   $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();

                   if( count($ciudadano) > 0){

                       echo Json::encode($ciudadano->TELFCIUD);

                   }else {
                      echo Json::encode('');
                   }


                 }




          /*ciudadano*/
    /**
     * Lists all TarjControlvac models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TarjControlvacSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TarjControlvac model.
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
     * Creates a new TarjControlvac model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TarjControlvac();

        $modelVacunacion = [new Calendariovacunacion];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        return $this->redirect(['view', 'id' => $model->CODTARCONTVAC]);

        } else {
        return $this->render('create', [
            'model' => $model,
            'modelVacunacion' => (empty($modelVacunacion)) ? [new Calendariovacunacion] : $modelVacunacion
        ]);
        }


    }

    /**
     * Updates an existing TarjControlvac model.
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
     * Deletes an existing TarjControlvac model.
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
     * Finds the TarjControlvac model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TarjControlvac the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TarjControlvac::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
