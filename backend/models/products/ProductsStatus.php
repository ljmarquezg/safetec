<?php

namespace backend\models\products;

use Yii;

/**
 * This is the model class for table "products_status".
 *
 * @property integer $id_product_status
 * @property string $description
 */
class ProductsStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product_status'], 'required'],
            [['id_product_status'], 'integer'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_product_status' => 'Id Product Status',
            'description' => 'Description',
        ];
    }
}
