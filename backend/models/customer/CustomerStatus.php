<?php

namespace backend\models\customer;

use Yii;

/**
 * This is the model class for table "customer_status".
 *
 * @property integer $id_status
 * @property string $status_description
 */
class CustomerStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status'], 'required'],
            [['id_status'], 'integer'],
            [['status_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status' => 'Id Status',
            'status_description' => 'Status Description',
        ];
    }
}
