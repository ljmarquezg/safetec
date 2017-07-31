<?php

namespace backend\models\products;

use Yii;

/**
 * This is the model class for table "products_chemical".
 *
 * @property integer $id_products_chemical
 * @property string $products_chemical_description
 */
class ProductsChemical extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_chemical';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products_chemical'], 'required'],
            [['id_products_chemical'], 'integer'],
            [['products_chemical_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_products_chemical' => 'Id Products Chemical',
            'products_chemical_description' => 'Products Chemical Description',
        ];
    }
}
