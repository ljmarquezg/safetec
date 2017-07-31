<?php

namespace backend\models\customer;

use Yii;
use backend\models\contract\ContractServices;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * This is the model class for table "customer_branch".
 *
 * @property integer $id_customer_branch
 * @property integer $id_customer
 * @property string $customer_branch_name
 * @property string $customer_branch_email
 * @property string $customer_branch_phone
 * @property string $customer_branch_address
 * @property string $customer_branch_address2
 * @property string $customer_branch_created
 * @property integer $id_customer_branch_status
 *
 * @property Customer $idCustomer
 * @property ContractServices $idCustomerBranch
 */
class CustomerBranch extends \yii\db\ActiveRecord
{   
    public $file;
    public $crop_info;
    /**
     * @inheritdoc
     */

 public function upload()
{
    // open image
    //$image = Image::getImagine()->open($this->image->tempName);
    
    $file = Image::getImagine()->open($this->file->tempName);

    // rendering information about crop of ONE option 
    $cropInfo = Json::decode($this->crop_info)[0];
    $cropInfo['dWidth'] = (int)$cropInfo['dWidth']; //new width image
    $cropInfo['dHeight'] = (int)$cropInfo['dHeight']; //new height image
    $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
    $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y
    // Properties bolow we don't use in this example
    //$cropInfo['ratio'] = $cropInfo['ratio'] == 0 ? 1.0 : (float)$cropInfo['ratio']; //ratio image. 
    //$cropInfo['width'] = (int)$cropInfo['width']; //width of cropped image
    //$cropInfo['height'] = (int)$cropInfo['height']; //height of cropped image
    //$cropInfo['sWidth'] = (int)$cropInfo['sWidth']; //width of source image
    //$cropInfo['sHeight'] = (int)$cropInfo['sHeight']; //height of source image

    //delete old images
    $oldImages = FileHelper::findFiles(Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/customer/'), [
        'only' => [
            $this->id_customer . '.*',
            'thumb_' . $this->id_customer . '.*',
        ], 
    ]);
    for ($i = 0; $i != count($oldImages); $i++) {
        @unlink($oldImages[$i]);
    }

    //saving thumbnail
    $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
    $cropSizeThumb = new Box(200, 200); //frame size of crop
    $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
    $pathThumbImage = Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/customer/') 
        . '/thumb_' 
        . $this->customer_branch_name 
        . '_'
        . $this->id_customer
        . '.' 
        . $this->file->getExtension();  

    //$image->resize($newSizeThumb)
    $file->resize($newSizeThumb)
        ->crop($cropPointThumb, $cropSizeThumb)
        ->save($pathThumbImage, ['quality' => 50]);

    //saving original
        $this->file->saveAs(
        Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/customer/') 
        . '/' 
        . $this->customer_branch_name 
        . '_'
        . $this->id_customer
        . '.' 
        . $this->file->getExtension()
    );
                  
}
    public static function tableName()
    {
        return 'customer_branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer', 'customer_branch_name', 'customer_branch_address','customer_branch_country'], 'required'],
            [['id_customer', 'id_customer_branch_status'], 'integer'],
            [['customer_branch_created'], 'safe'],
            [['image'], 'string', 'max' => 200],
            [['file'], 'file'],
            ['crop_info', 'safe'],
            [['customer_branch_name', 'customer_branch_address', 'customer_branch_address2','customer_branch_country', 'customer_branch_state' ], 'string', 'max' => 255],
            [['customer_branch_email'], 'string', 'max' => 200],
            [['customer_branch_phone', 'customer_branch_zone', 'customer_branch_fax'], 'string', 'max' => 40],
            [['customer_branch_zip'], 'string', 'max' => 10],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'id_customer']],
            /*[['id_customer_branch'], 'exist', 'skipOnError' => true, 'targetClass' => ContractServices::className(), 'targetAttribute' => ['id_customer_branch' => 'id_customer_branch']],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer_branch' => 'Id',
            'id_customer' => 'Customer',
            'customer_branch_name' => 'Branch name',
            'customer_branch_email' => 'Email',
            'customer_branch_phone' => 'Phone',
            'customer_branch_fax' => 'Fax',
            'customer_branch_country'=>'Country',
            'customer_branch_zip'=> 'ZipCode',
            'customer_branch_zone'=> 'Zone',
            'customer_branch_state'=> 'State',
            'customer_branch_address' => 'Address',
            'customer_branch_address2' => 'Address2',
            'customer_branch_created' => 'Created',
            'id_customer_branch_status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_customer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCustomerBranch()
    {
        return $this->hasOne(ContractServices::className(), ['id_customer_branch' => 'id_customer_branch']);
    }
}
