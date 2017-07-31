<?php

namespace backend\models\customer;

use Yii;

use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;
/**
 * This is the model class for table "customer".
 *
 * @property integer $id_customer
 * @property string $customer_name
 * @property string $customer_address
 * @property string $customer_address2
 * @property string $customer_contact
 * @property string $customer_country
 * @property string $customer_state
 * @property string $customer_zip
 * @property string $customer_zone
 * @property string $customer_created
 * @property string $customer_phone
 * @property string $customer_fax
 * @property string $customer_email
 * @property integer $id_customer_status
 * @property string $image
 * @property integer $customer_status
 */
class Customer extends \yii\db\ActiveRecord
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
        . $this->customer_name 
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
        . $this->customer_name 
        . '_'
        . $this->id_customer
        . '.' 
        . $this->file->getExtension()
    );
                  
}


    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'id_customer_status','customer_address'], 'required'],
            [['customer_created'], 'safe'],
            [['id_customer_status', 'customer_status'], 'integer'],
            [['image'], 'string', 'max' => 200],
            [['file'], 'file'],
            ['crop_info', 'safe'],
            [['customer_phone', 'customer_fax'], 'string', 'max'=>40],
            [['customer_name', 'customer_address', 'customer_address2', 'customer_contact', 'customer_country', 'customer_state', 'customer_zip', 'customer_zone','customer_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Customer',
            'customer_name' => 'Customer Name',
            'customer_address' => 'Address',
            'customer_address2' => 'Address2',
            'customer_contact' => 'Contact',
            'customer_country' => 'Country',
            'customer_state' => 'State',
            'customer_zip' => 'Zip',
            'customer_zone' => ' Zone',
            'customer_created' => 'Created',
            'customer_phone' => 'Phone',
            'customer_fax' => 'Fax',
            'customer_email' =>  'Email',
            'id_customer_status' => 'Status',
            'image' => 'Logo',
            'customer_status' => 'Status',
        ];
    }
}
