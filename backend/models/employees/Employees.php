<?php

namespace backend\models\employees;

use Yii;
use backend\models\department\Department;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;
/**
 * This is the model class for table "employees".
 *
 * @property integer $id_employees
 * @property string $employee_name
 * @property string $employees_phone
 * @property string $employees_email
 * @property double $employees_vacation
 * @property double $employees_sick
 * @property double $employees_casual
 * @property double $employees_bereavement
 * @property string $employees_startdate
 * @property integer $id_employees_department
 * @property string $image
 * @property integer $employees_status
 * @property string $employees_created
 */
class Employees extends \yii\db\ActiveRecord
{
    public $file;
    public $crop_info;
    /**
     * @inheritdoc
     */
/*public function afterSave($insert, $changedAttributes)
{


    if(!empty($model->file) && $model->file->size !== 0) {
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
    $oldImages = FileHelper::findFiles(Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/employees/'), [
        'only' => [
            $this->id_employees . '.*',
            'thumb_' . $this->id_employees . '.*',
        ], 
    ]);
    for ($i = 0; $i != count($oldImages); $i++) {
        @unlink($oldImages[$i]);
    }

    //saving thumbnail
    $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
    $cropSizeThumb = new Box(200, 200); //frame size of crop
    $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
    $pathThumbImage = Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/employees/') 
        . '/thumb_' 
        . $this->employees_name 
        . '_'
        . $this->id_employees
        . '.' 
        . $this->file->getExtension();  

    //$image->resize($newSizeThumb)
    $file->resize($newSizeThumb)
        ->crop($cropPointThumb, $cropSizeThumb)
        ->save($pathThumbImage, ['quality' => 100]);

    //saving original
    $this->file->saveAs(
        Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/employees/') 
        . '/' 
        . $this->employees_name 
        . '_'
        . $this->id_employees
        . '.' 
        . $this->file->getExtension()
    );
    }                    
}
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
    $oldImages = FileHelper::findFiles(Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/employees/'), [
        'only' => [
            $this->id_employees . '.*',
            'thumb_' . $this->id_employees . '.*',
        ], 
    ]);
    for ($i = 0; $i != count($oldImages); $i++) {
        @unlink($oldImages[$i]);
    }

    //saving thumbnail
    $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
    $cropSizeThumb = new Box(200, 200); //frame size of crop
    $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
    $pathThumbImage = Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/employees/') 
        . '/thumb_' 
        . $this->employees_name 
        . '_'
        . $this->id_employees
        . '.' 
        . $this->file->getExtension();  

    //$image->resize($newSizeThumb)
    $file->resize($newSizeThumb)
        ->crop($cropPointThumb, $cropSizeThumb)
        ->save($pathThumbImage, ['quality' => 100]);

    //saving original
        $this->file->saveAs(
        Yii::getAlias($_SERVER['DOCUMENT_ROOT'].'/uploads/employees/') 
        . '/' 
        . $this->employees_name 
        . '_'
        . $this->id_employees
        . '.' 
        . $this->file->getExtension()
    );
                  
}


    public static function tableName()
    {
        return 'employees';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employees_name', 'employees_startdate', 'employees_email', 'id_employees_department'], 'required'],
            [['employees_vacation', 'employees_sick', 'employees_casual', 'employees_bereavement'], 'number'],
            [['employees_startdate', 'Employees_Create', 'crop_info'], 'safe'],
            [['id_employees_department', 'employees_status'], 'integer'],
            [['employees_name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 200],[['file'], 'file'],
            [['employees_phone'], 'string', 'max' => 50],
            [['employees_email'], 'string', 'max' => 100],
            [['id_employees_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id_employees_department' => 'id_department']]
            ];
        }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_employees' => 'Id Employees',
            'employees_name' => 'Employee Name',
            'employees_phone' => 'Employees phone',
            'employees_email' => 'Employees Email',
            'employees_vacation' => 'Employees Vacation',
            'employees_sick' => 'Employees Sick',
            'employees_casual' => 'Employees Casual',
            'employees_bereavement' => 'Employees Bereavement',
            'employees_startdate' => 'Employees Startdate',
            'id_employees_department' => 'Department',
            'image' => 'Image',
            'employees_status' => 'Status',
            'employees_created' => 'Created',
        ];
    }

     public function getEmployeesDepartment()
    {
        return $this->hasOne(Department::className(), ['id_department' => 'id_employees_department']);
    }

}
