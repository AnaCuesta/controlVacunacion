<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "esquemavac".
 *
 * @property integer $idesquemavac
 * @property string $esquemavac
 */
class Esquemavac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'esquemavac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idesquemavac', 'esquemavac'], 'required'],
            [['idesquemavac'], 'integer'],
            [['esquemavac'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idesquemavac' => 'Idesquemavac',
            'esquemavac' => 'Esquemavac',
        ];
    }
}
