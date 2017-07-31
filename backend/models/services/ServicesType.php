<?php

namespace backend\models\services;

use Yii;

/**
 * This is the model class for table "services_type".
 *
 * @property integer $id_services
 * @property string $services_description
 */
class ServicesType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_services'], 'required'],
            [['id_services'], 'integer'],
            [['services_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_services' => 'Id Services',
            'services_description' => 'Services Description',
        ];
    }
}
