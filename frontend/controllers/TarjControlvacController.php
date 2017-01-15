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
use yii\helpers\ArrayHelper;
use frontend\models\TarjControlvacSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use frontend\models\Calendariovacunacion;
use frontend\models\Vacuna;
use frontend\models\Dosis;
use frontend\models\REdadVac;
use common\models\Model;
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
         //echo "<option>Seleccione la opción..</option>";
         foreach ($dosis  as  $value) {
           echo "<option value='".$value->CODDOSIS."'>".$value->DOSIS."</option>";
         }
       }else {
         echo "<option></option>";
       }

     }
     /**
       *  Lista las dosis
       * @return mixed
       */
      public function actionListadoRangoEdad($id)
      {

        $contarVacuna  = Vacuna::find()->where(['CODVACUNA'=> $id])->count();
        $edad = REdadVac::find()->where(['CODVACUNA'=> $id])->all();

        if($contarVacuna > 0){
          //echo "<option>Seleccione la opción..</option>";
          foreach ($edad  as  $value) {
            echo "<option value='".$value->CODRANGOEDAD."'>".$value->RANGOEDAD."</option>";
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
        if(!empty($id)){
          $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
          echo Json::encode($establecimiento->ZONA);
        }else{
          echo Json::encode('');
        }

      }
      /**
         *  Obtiene el nombre de la zona
         * @return mixed
         */
        public function actionDistrito($id)
        {


            if(!empty($id)){
              $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
              echo Json::encode($establecimiento->DISTRITO);
            }else{
              echo Json::encode('');

            }
        }
        /**
         *  Obtiene el nombre de la zona
         * @return mixed
         */
        public function actionCanton($id)
        {
            if(!empty($id)){
              $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
              $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $establecimiento->CODPARROQUIA])->one();
              $canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
              echo Json::encode($canton->CANTON);
            }else{
              echo Json::encode('');

            }
        }
      /**
         *  Obtiene el nombre de la zona
         * @return mixed
         */
        public function actionProvincia($id)
        {

          if(!empty($id)){
            $establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $id])->one();
            $parroquia = Parroquia::find()->where(['CODPARROQUIA' => $establecimiento->CODPARROQUIA])->one();
            $canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
            $provincia = Provincia::find()->where(['CODPROVINCIA' => $canton->CODPROVINCIA])->one();
            echo Json::encode($provincia->PROVINCIA);
          }else{
            echo Json::encode('');

          }
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
               /**
                  *  Obtiene el nombre de la zona
                  * @return mixed
                  */
                 public function actionCalcularEdad($id)
                 {
                   $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                   $mesActual = date('m');
                   $mesNacimiento = substr($ciudadano->FECHANACIMIENTO,5,2);
                   $anioActual = date('Y');
                   $anioNacimiento = substr($ciudadano->FECHANACIMIENTO,0,4);
                   $diaActual = date('d') ;
                   $diaNacimiento = substr($ciudadano->FECHANACIMIENTO,8,4);
                   $anio = 0;
                   $mes = 0;


                if($mesActual >= $mesNacimiento){
                   $anio = ($anioActual - $anioNacimiento);
                 }else{
                  $anio = ($anioActual - $anioNacimiento)-1;
                 }

                 if($diaActual >= $diaNacimiento){

                   if($mesActual >= $mesNacimiento){

                      $mes = ($mesActual - $mesNacimiento);

                   }else{
                     $mes = ($mesActual - $mesNacimiento)+12;
                     if($mes==12){
                       $mes = 0;
                     }
                   }

                  }else{

                    if($mesActual >= $mesNacimiento){
                       $mes = ($mesActual - $mesNacimiento)-1;
                    }else{
                      $mes = ($mesActual - $mesNacimiento)+11;
                      if($mes==11){
                        $mes = 0;
                      }
                    }

                  }

                  echo Json::encode($anio.' Años '.$mes.' Meses');


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

        $idTarjeta = TarjControlvac::find()->max('CODTARCONTVAC');

        $model->CODTARCONTVAC = ($idTarjeta+1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        // get Payment data from POST
         $modelVacunacion = Model::createMultiple(Calendariovacunacion::classname());
         Model::loadMultiple($modelVacunacion, Yii::$app->request->post());

         $valid = $model->validate();

         //$valid = Model::validateMultiple($modelVacunacion) && $valid;

         // save deposit data
         if ($valid) {

                  $transaction = \Yii::$app->db->beginTransaction();
                      try {
                          if ($flag = $model->save(false)) {
                                foreach ($modelVacunacion as $modelVacunacion) {


                                   $modelVacunacion->CODTARCONTVAC = $model->CODTARCONTVAC;


                                    if (! ($flag =$modelVacunacion->save(false))) {
                                        $transaction->rollBack();
                                        break;
                                    }
                                }
                            }
                            if ($flag) {
                                $transaction->commit();
                                return $this->redirect(['view', 'id' => $model->CODTARCONTVAC]);
                            }
                        } catch (Exception $e) {
                            $transaction->rollBack();
                  }
            }



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

        //$modelVacunacion = [new Calendariovacunacion];

        $modelVacunacion =  Calendariovacunacion::find()->where(['CODTARCONTVAC' => $id])->all();// get values by actual Id
        // get values by actual Id



        //$modelVacunacion =  $model->Calendariovacunacion;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          $oldIDs = ArrayHelper::map($modelVacunacion, 'IDCALENDARIO', 'IDCALENDARIO');

          $dosisOldIDs = Calendariovacunacion::find()->where(['CODTARCONTVAC' => $id])->one() ;

          $modelVacunacion = Model::createMultipleUpdate(Calendariovacunacion::classname(), $modelVacunacion,'IDCALENDARIO');



          Model::loadMultiple($modelVacunacion, Yii::$app->request->post());

          $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelVacunacion, 'IDCALENDARIO', 'IDCALENDARIO')));

          //validaciones

          $valid = $model->validate();

          //$valid = Model::validateMultiple($modelVacunacion) && $valid;

          if ($valid) {
          $transaction = \Yii::$app->db->beginTransaction();

          try {
            if ($flag = $model->save(false)) {

            if (! empty($deletedIDs)) {

              Calendariovacunacion::deleteAll(['IDCALENDARIO' => $deletedIDs]);



            }


            $dosis = ArrayHelper::getColumn($modelVacunacion, 'CODDOSIS');
            $rangoEdad = ArrayHelper::getColumn($modelVacunacion, 'CODRANGOEDAD');



            foreach ($modelVacunacion as $i => $modelVacunacion) {

                $modelVacunacion->CODTARCONTVAC = $model->CODTARCONTVAC;

                $modelVacunacion->CODDOSIS = $dosis[$i];

                $modelVacunacion->CODRANGOEDAD = $rangoEdad[$i];

                //print_r($dosis[$i]);

                if (! ($flag = $modelVacunacion->save(false))) {
                    $transaction->rollBack();
                    break;
                }
              }


            }

        if ($flag) {
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->CODTARCONTVAC]);
                 }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
          }

        } else {
            return $this->render('update', [
                'model' => $model,
                'modelVacunacion' => (empty($modelVacunacion)) ? [new Calendariovacunacion] : $modelVacunacion

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
        $modelVacunacion =  Calendariovacunacion::find()->where(['CODTARCONTVAC' => $id])->all();

        $oldIDs = ArrayHelper::map($modelVacunacion, 'IDCALENDARIO', 'IDCALENDARIO');

        Calendariovacunacion::deleteAll(['IDCALENDARIO' => $oldIDs]);

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
