<?php

namespace backend\models\app;

use Yii;

/**
 * This is the model class for table "app".
 *
 * @property integer $id_app
 * @property string $company_image
 * @property string $user_image
 * @property string $customer_image
 * @property string $customer_branch_image
 */
class App extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_image', 'user_image', 'customer_image', 'customer_branch_image'], 'required'],
            [['company_image', 'user_image', 'customer_image', 'customer_branch_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_app' => 'Id App',
            'company_image' => 'Company Image',
            'user_image' => 'User Image',
            'customer_image' => 'Customer Image',
            'customer_branch_image' => 'Customer Branch Image',
        ];
    }
}
