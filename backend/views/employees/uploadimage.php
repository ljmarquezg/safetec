<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\Department;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\icons\Icon;
use kartik\grid\GridView;
use kartik\datecontrol\DateControl;
use kartik\datecontrol\Module;
use kartik\checkbox\CheckboxX;
use kartik\file\FileInput;

/*use kartik\switchinput\SwitchInput;*/
/*use kartik\switchnew\MySwitch;*/
/*use kartik\widgets\ActiveForm;*/
/* @var $this yii\web\View */
/* @var $model backend\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-xs-12">

                    <?php echo $form->field($model, 'image')->widget(Cropbox::className(), [
                        'attributeCropInfo' => 'crop_info',
                    ]);?>


</div>