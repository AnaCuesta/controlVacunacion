<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "nombreestablecimiento".
 *
 * @property integer $idNombreEstablecimiento
 * @property string $nombreEstalecimiento
 * @property string $idDistrito
 */
class Nombreestablecimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nombreestablecimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNombreEstablecimiento', 'nombreEstalecimiento', 'idDistrito'], 'required'],
            [['idNombreEstablecimiento'], 'integer'],
            [['nombreEstalecimiento'], 'string', 'max' => 80],
            [['idDistrito'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNombreEstablecimiento' => 'Id Nombre Establecimiento',
            'nombreEstalecimiento' => 'Nombre Estalecimiento',
            'idDistrito' => 'Id Distrito',
        ];
    }
}
