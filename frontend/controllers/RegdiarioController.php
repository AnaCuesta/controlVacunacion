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
use frontend\models\Ciudadano;
use frontend\models\ZonaUbic;
use frontend\models\Parroquia;
use frontend\models\Vacuna;
use frontend\models\REdadVac;
use frontend\models\Dosis;
use frontend\models\Autoidetnica;
use frontend\models\Lugarresidencia;
use frontend\models\Localidad;
use frontend\models\Genero;
use frontend\models\Vacunacionregistrodiario;
use frontend\models\Nacionalidad;


use common\models\Model;
use yii\helpers\ArrayHelper;
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
/*Dynamic Form*/
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
/*Dynamic Form*/

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
                     public function actionCedulaCiudadano($id)
                     {
                       $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();

                       if( count($ciudadano) > 0){

                           echo Json::encode($ciudadano->CEDULA);

                       }else {
                          echo Json::encode('');
                       }


                     }
                   /**
                      *  Obtiene el nombre de la zona
                      * @return mixed
                      */
                     public function actionSexoCiudadano($id)
                     {
                       $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();
                       $genero = Genero::find()->where(['CODSEXO' => $ciudadano->CODSEXO])->one();

                       if( count($ciudadano) > 0){

                           echo Json::encode($genero->SEXO);

                       }else {
                          echo Json::encode('');
                       }


                     }

                     /**
                        *  Obtiene el nombre de la zona
                        * @return mixed
                        */
                       public function actionPerteneceCiudadano($id)
                       {
                         $ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $id])->one();


                         if( count($ciudadano) > 0){

                             echo Json::encode($ciudadano->SNPERTENECEUO);

                         }else {
                            echo Json::encode('');
                         }


                       }




                /*ciudadano*/
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




        $modelRegistro = [new Vacunacionregistrodiario];

        $idRegistro = Regdiario::find()->max('CODREGISTRODIARIO');

        $model->CODREGISTRODIARIO = ($idRegistro+1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        // get Payment data from POST
         $modelRegistro = Model::createMultiple(Vacunacionregistrodiario::classname());
         Model::loadMultiple($modelRegistro, Yii::$app->request->post());

         $valid = $model->validate();

         //$valid = Model::validateMultiple($modelRegistro) && $valid;

         // save deposit data
         if ($valid) {




                  $transaction = \Yii::$app->db->beginTransaction();
                      try {
                          if ($flag = $model->save(false)) {
                                foreach ($modelRegistro as $modelRegistro) {


                                   $modelRegistro->CODREGISTRODIARIO = $model->CODREGISTRODIARIO;


                                    if (! ($flag =$modelRegistro->save(false))) {
                                        $transaction->rollBack();
                                        break;
                                    }
                                }
                            }
                            if ($flag) {
                                $transaction->commit();
                                return $this->redirect(['view', 'id' => $model->CODREGISTRODIARIO]);
                            }
                        } catch (Exception $e) {
                            $transaction->rollBack();
                  }
            }



        } else {

        return $this->render('create', [
            'model' => $model,
            'modelRegistro' => (empty($modelRegistro)) ? [new Vacunacionregistrodiario] : $modelRegistro
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


      //$modelRegistro = [new Vacunacionregistrodiario];

      $modelRegistro =  Vacunacionregistrodiario::find()->where(['CODREGISTRODIARIO' => $id])->all();// get values by actual Id
      // get values by actual Id



      //$modelRegistro =  $model->Vacunacionregistrodiario;

      if ($model->load(Yii::$app->request->post()) && $model->save()) {

        $oldIDs = ArrayHelper::map($modelRegistro, 'IDVAUNACIONREGDIARIO', 'IDVAUNACIONREGDIARIO');

        $dosisOldIDs = Vacunacionregistrodiario::find()->where(['CODREGISTRODIARIO' => $id])->one() ;

        $modelRegistro = Model::createMultipleUpdate(Vacunacionregistrodiario::classname(), $modelRegistro,'IDVAUNACIONREGDIARIO');



        Model::loadMultiple($modelRegistro, Yii::$app->request->post());

        $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelRegistro, 'IDVAUNACIONREGDIARIO', 'IDVAUNACIONREGDIARIO')));

        //validaciones

        $valid = $model->validate();

        //$valid = Model::validateMultiple($modelRegistro) && $valid;

        if ($valid) {
        $transaction = \Yii::$app->db->beginTransaction();

        try {
          if ($flag = $model->save(false)) {

          if (! empty($deletedIDs)) {

            Vacunacionregistrodiario::deleteAll(['IDVAUNACIONREGDIARIO' => $deletedIDs]);



          }


          $dosis = ArrayHelper::getColumn($modelRegistro, 'CODDOSIS');
          $rangoEdad = ArrayHelper::getColumn($modelRegistro, 'CODRANGOEDAD');



          foreach ($modelRegistro as $i => $modelRegistro) {

              $modelRegistro->CODREGISTRODIARIO = $model->CODREGISTRODIARIO;

              $modelRegistro->CODDOSIS = $dosis[$i];

              $modelRegistro->CODRANGOEDAD = $rangoEdad[$i];

              //print_r($dosis[$i]);

              if (! ($flag = $modelRegistro->save(false))) {
                  $transaction->rollBack();
                  break;
              }
            }


          }

      if ($flag) {
              $transaction->commit();
              return $this->redirect(['view', 'id' => $model->CODREGISTRODIARIO]);
               }
          } catch (Exception $e) {
              $transaction->rollBack();
          }
        }

      } else {
          return $this->render('update', [
              'model' => $model,
              'modelRegistro' => (empty($modelRegistro)) ? [new Vacunacionregistrodiario] : $modelRegistro

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
      $modelRegistro =  Vacunacionregistrodiario::find()->where(['CODREGISTRODIARIO' => $id])->all();

      $oldIDs = ArrayHelper::map($modelRegistro, 'IDVAUNACIONREGDIARIO', 'IDVAUNACIONREGDIARIO');

      Vacunacionregistrodiario::deleteAll(['IDVAUNACIONREGDIARIO' => $oldIDs]);

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
