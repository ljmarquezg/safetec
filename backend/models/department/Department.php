<?php

namespace backend\models\department;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id_department
 * @property string $description
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_department' => 'Id Department',
            'description' => 'Description',
        ];
    }
}
