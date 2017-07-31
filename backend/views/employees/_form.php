<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
//use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use backend\models\department\Department;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use bupy7\cropbox\Cropbox;
use yii\imagine\Image;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\models\employees\Employees */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
/*******
* View
******/

// The controller action that will render the list
$url = \yii\helpers\Url::to(['/department/department-list']);
// Get the initial city description
$departmentDesc = empty($model->id_department) ? '' : Department::findOne($model->id_department)->description;
    $employees_image =  Yii::$app->params['employees_image'];
    if(!is_null($model->id_employees)){
        $imageQuery = Yii::$app->db->createCommand("SELECT image FROM employees WHERE id_employees = $model->id_employees"  );
        $imagePath = $imageQuery->queryScalar();
        if(is_null($imagePath) or $imagePath ==''){
            $imagePath = $employees_image;
        }else{
            $imagePath = $imagePath;
        }
    }else{
        $imagePath = $employees_image;
    }

?>

<div class="employees-form">
    <div id="message">
    </div>

    <?php $form = ActiveForm::begin(['id'=>$model->formName(),'options' => ['enctype'=>'multipart/form-data'],]); ?>
    <div id="userImage" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <?php echo $form->field($model, 'file')->widget(Cropbox::className(), ['attributeCropInfo' => 'crop_info',]);?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>   
    <div class="col-xs-12 col-xs-no-padding">

        <?php $data = ArrayHelper::map(Department::find()->all(), 'id_department', 'description')?>

        <div class="employees-form">
            <div class="col-md-12 col-xs-no-padding">
                <h1 class="widget-user-title bg-aqua"><?= $this->title ?></h1>
                <div class="box box-widget widget-user view ">
                    <div class="widget-user-header bg-aqua-active">
                        <div class="widget-user-image">

                            <img class="img-circle" src="<?php echo $imagePath ?>" alt="User Avatar">
                            <button type="button" class="btn btn-default btn-block btn-file" id="deleteImage"><i class="glyphicon glyphicon-trash"></i> </button>
                            <button type="button" class="btn btn-default y btn-block btn-file modalButton" id="UserImage" data-toggle="modal" data-target="#userImage"><i class="glyphicon glyphicon-camera"></i>  </button>


                            <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                                <?= $form->field($model, 'employees_status')->checkbox(array('id'=>'employees-'.$model->id_employees,
                                'class'=>'onoffswitch-checkbox','label' => '','data-status'=>$model->id_employees,'value'=>$model->id_employees,))?>
                                <script type="text/javascript">
                                    </script>

                                </div>
                            </div>
                            <!--Left - Container-->
                            <!--Right Container-->
                            <div class="widget-header-input">
                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <?= $form->field($model, 'employees_name')->textInput(['maxlength' => true, 'class'=>'text-left'])?>
                                    </h3>
                                </div>

                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <h5 class="description-header"> <?= $form->field($model, 'employees_email')->input('email',['maxlength' => true,'class'=>'text-left']) ?></h5>
                                    </h3>
                                </div>

                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <h5 class="description-header"> <h5 class="description-header"><?= $form->field($model, 'employees_phone')->textInput(['maxlength' => true,'class'=> 'text-left']) ?></h5></h5>
                                    </h3>
                                </div>

                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="divider"></div>
                                <div class="col-md-6 col-sm-12">
                                    <?= $form->field($model, 'employees_startdate')->widget(DateControl::classname(), ['value' =>  $model->employees_startdate,'ajaxConversion' => true,'displayFormat' => 'dd-MM-yyyy','saveFormat' => 'yyyy-MM-dd','options' => ['pluginOptions' => ['autoclose' => true]]]) ?>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <?php 
                                    Modal::begin([
                                        'header'=>'<h3> <i class="ion ion-brief"></i> Create Department </h3>',
                                        'headerOptions'=>['class'=>'bg-yellow'],
                                        'id'=> 'modalAddDepartment',
                                        'size'=>'modal-lg',
                                        'options'=>['data-backdrop'=>'static',
                                        'data-keyboard'=>"false",]
                                        ]);
                                    echo '<div id="modalContentAddDepartment"></div>';

                                    Modal::end();
                                    ?>  


                                    <?= $form->field($model, 'id_employees_department')->widget(Select2::classname(), [
                                    'data' => $data,'language' => 'en','initValueText' => $departmentDesc, 'options' => ['placeholder' => 'Search for a Department ...'],'id'=>'id_department','addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-briefcase"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/department/createmodal'),'id'=>'AddDepartment', 'class' => 'btn btn-success modalButton','title' => 'Create Department', 'data-toggle' => 'tooltip']),'asButton' => true],'pluginOptions' => ['allowClear' => true],],'pluginOptions' => ['minimumInputLength' => 0,'ajax' => ['url' => $url,'dataType' => 'json','data' => new JsExpression('function(params) { return {q:params.term}; }')],'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),'templateResult' => new JsExpression('function(city) { return city.text; }'),'templateSelection' => new JsExpression('function (city) { return city.text; }'),'allowClear' => true,],]);?>
                                </div>
                                <div class="col-md-3 col-xs-6 ">
                                    <div class="description-block">
                                        <?= $form->field($model, 'employees_vacation')->textInput() ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6 ">
                                    <div class="description-block">
                                        <?= $form->field($model, 'employees_sick')->textInput() ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6 ">
                                    <div class="description-block">
                                        <?= $form->field($model, 'employees_casual')->textInput() ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6 ">
                                    <div class="description-block">
                                        <?= $form->field($model, 'employees_bereavement')->textInput() ?>
                                    </div>
                                </div>
                                <div class="col-xs-12"-->
                                    <div class="form-group pull-right">
                                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
<?php 
$cropImage = <<< JS
        $(window).ready(function(){
            $('#userImage .close ').addClass('hidden');
              croppedImage()
        })

                $('#userImage .btn.btn-default ').on('click',function(){
                    croppedImage();
        })

        function croppedImage(){
            var croppedImage = ($('.img-thumbnail').attr("src"));
            $('.employees-form .img-circle').attr('src', croppedImage );    
        }

        $('#deleteImage').on('click',function(){
            $('.employees-form .img-circle').attr('src','{$employees_image}');
        })

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
JS;
$this->registerJs($cropImage);
?>