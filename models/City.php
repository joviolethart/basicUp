<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $id_country
 * @property string $name
 * @property integer $population
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_country', 'name', 'population'], 'required'],
            [['id', 'population'], 'integer'],
            [['id_country'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_country' => Yii::t('app', 'Id Country'),
            'name' => Yii::t('app', 'Name'),
            'population' => Yii::t('app', 'Population'),
        ];
    }

    /**
     * @inheritdoc
     * @return CityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CityQuery(get_called_class());
    }
}
