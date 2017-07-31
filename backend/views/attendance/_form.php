<?php

/*use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\Attendance */
/* @var $form yii\widgets\ActiveForm */
/*?>

<div class="attendance-form">

<?php $form = ActiveForm::begin(); ?>

<!--?= $form->field($model, 'id_eployees')->textInput() ?-->

<?= $form->field($model, 'attendance_startdate')->textInput() ?>

<?= $form->field($model, 'attendance_enddate')->textInput() ?>

<?= $form->field($model, 'attendance_type')->textInput() ?>

<?= $form->field($model, 'total_days')->textInput() ?>

<?= $form->field($model, 'vacation')->textInput() ?>

<?= $form->field($model, 'siickleave')->textInput() ?>

<?= $form->field($model, 'casual')->textInput() ?>

<?= $form->field($model, 'bereavement')->textInput() ?>

<?= $form->field($model, 'nocontact')->textInput() ?>

<?= $form->field($model, 'late')->textInput() ?>

<?= $form->field($model, 'other')->textInput() ?>

<?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'created_date')->textInput() ?>

<div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
*/?>

<?php
use backend\models\employees\Employees;
use bakcend\controllers\EmployeesController;
use backend\models\attendance\AttendanceType;
use backend\models\department\Department;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\base\Widget;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\grid\GridView;
use kartik\datecontrol\DateControl;
use kartik\datecontrol\Module;
use kartik\checkbox\CheckboxX;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\Attendance */
/* @var $form yii\widgets\ActiveForm */
?>


<?php 
if (!isset($model->attendance_startdate)){
    $model->attendance_startdate = date('Y/m/d');
};

if (!isset($model->attendance_enddate)){
    $model->attendance_enddate = date('Y/m/d');
};

if (!isset($model->total_days)){
    $model->total_days = 0;
};

if (!isset($model->vacation)){
    $model->vacation = 0;
};

if (!isset($model->sickleave)){
    $model->sickleave = 0;
};
if (!isset($model->casual)){
    $model->casual = 0;
};

if (!isset($model->bereavement)){
    $model->bereavement = 0;
};

if (!isset($model->nocontact)){
    $model->nocontact = 0;
};

if (!isset($model->late)){
    $model->late = 0;
};

if (!isset($model->other)){
    $model->other = 0;
};

// The controller action that will render the list
$urlEmployees = \yii\helpers\Url::to(['/employees/employees-list']);
// Get the initial city description
$employeesDesc = empty($model->id_employees) ? '' : Employees::findOne($model->id_employees)->employees_name; 

$urlAttendance = \yii\helpers\Url::to(['/attendance/attendance-type-list']);
// Get the initial city description
$attendanceTypeDesc = empty($model->id_attendance_type) ? '' : AttendanceType::findOne($model->id_attendance_type)->attendance_description; 
?>
<div class="attendance-form" id="form">
    <?php $form = ActiveForm::begin(); ?>
    <!--?= $form->field($model, 'Attendance_ID')->textInput() ?-->
    <div class="widget-user-title bg-primary">
        <h1 class="widget-user-title"><?= $this->title ?></h1>
    </div>
    <div class="widget-user-header box">
        <div class="col-md-6">
            <div class="widget-user-username">
                <h3 class="description-block text-left">
                    <?php $dataEmployees = ArrayHelper::map(Employees::find()->all(), 'id_employees', 'employees_name')?>

                    <?= 
                    $form->field($model, 'id_employees')->widget(Select2::classname(), ['data' => $dataEmployees,'language' => 'en','initValueText' => $employeesDesc, 'options' => ['placeholder' => 'Select an employee ...'],'addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-android-person"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/employees/createmodal'),'id'=>'AddEmployees', 'class' => 'btn btn-success modalButton','title' => 'Create Employee', 'data-toggle' => 'tooltip']),'asButton' => true],'pluginOptions' => ['allowClear' => true],],'pluginEvents' => ["change" => 'function() { var data_id = $(this).attr("id");/*alert(data_id);*/}',],'pluginOptions' => ['minimumInputLength' => 0,'ajax' => ['url' => $urlEmployees,'dataType' => 'json','dataEmployees' => new JsExpression('function(params) { return {q:params.term}; }')],'pjaxSettings' => ['options' => ['id' => 'id_employees']],'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),'templateResult' => new JsExpression('function(city) { return city.text; }'),'templateSelection' => new JsExpression('function (city) { return city.text; }'),'allowClear' => true,],])?>
                </h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget-user-username">
                <h3 class="description-block text-left">
                    <?php $dataAttendance = ArrayHelper::map(AttendanceType::find()->all(), 'id_attendance_type', 'attendance_description')?>
                    <!--?= $form->field($model, 'id_attendance_type')->widget(Select2::classname(), ['data' => $dataAttendance,'language' => 'en','options' => ['placeholder' => 'Select a Attendance Type...', 'id'=>'attendance_type'],'addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-clipboard"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/attendance-type/createmodal'),'id'=>'AddAttendanceType', 'class' => 'btn btn-success modalButton','title' => 'Create Attendance Type', 'data-toggle' => 'tooltip']),'asButton' => true],'pluginOptions' => ['allowClear' => true],],]);?-->
                    
                    <?= 
                    $form->field($model, 'id_attendance_type')->widget(Select2::classname(), ['data' => $dataAttendance,'language' => 'en','initValueText' => $attendanceTypeDesc, 'options' => ['placeholder' => 'Select Attendance Type ...'],'addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-android-person"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/attendance-type/createmodal'),'id'=>'AddAttendanceType', 'class' => 'btn btn-success modalButton','title' => 'Create Employee', 'data-toggle' => 'tooltip']),'asButton' => true],'pluginOptions' => ['allowClear' => true],],'pluginEvents' => ["change" => 'function() { var data_id = $(this).attr("id");/*alert(data_id);*/}',],'pluginOptions' => ['minimumInputLength' => 0,'ajax' => ['url' => $urlAttendance,'dataType' => 'json','data' => new JsExpression('function(params) { return {q:params.term}; }')],'pjaxSettings' => ['options' => ['id' => 'id_employees']],'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),'templateResult' => new JsExpression('function(city) { return city.text; }'),'templateSelection' => new JsExpression('function (city) { return city.text; }'),'allowClear' => true,],])?>
                </h3>
            </div>
        </div>
        <div class="box-footer">
            <div class="col-md-5 col-sm-12">
                <div class="description-block text-left">
                    <?= $form->field($model, 'attendance_startdate')->widget(DateControl::classname(), ['ajaxConversion' => true,'displayFormat' => 'dd/MM/yyyy','saveFormat' => 'yyyy-MM-dd','options' => ['class'=>'text-left', 'id'=>'attendance_startdate','pluginOptions' => ['autoclose' => true, 'todayHighlight' => true,]]]) ?>
                </div>
            </div>
            <div class="col-md-5 col-xs-12">
                <div class="description-block text-left">
                    <?= $form->field($model, 'attendance_enddate')->widget(DateControl::classname(),['ajaxConversion' => true,'displayFormat' => 'dd/MM/yyyy','saveFormat' => 'yyyy-MM-dd','options' => ['class'=>'text-left', 'id'=>'attendance_enddate','pluginOptions' => ['autoclose' => true,'todayHighlight' => true,]]]) ?>
                </div>
            </div>
            <div class="col-md-2 col-xs-12 ">
                <div class="description-block text-left">
                    <?= $form->field($model, 'total_days')->textInput(['class'=>'text-center', 'id'=>'total_days','disabled'=>'disabled']) ?>

                </div>
            </div>

            <div class="full-row info-content">       
                <div class="col-xs-12">
                    <div class="attendance-value text-center" >
                        <?php $datavacation = ArrayHelper::map(AttendanceType::find()->all(), 'id_attendance_type', 'attendance_value')?>

                        <?= $form->field($model, 'vacation')->textInput(['id'=>'vacation', 'disabled'=>'disabled', 'class'=>'text-center'])?>
                    </div>
                    <div class="attendance-value text-center" >
                        <?= $form->field($model, 'sickleave')->textInput(['id'=>'sickleave', 'disabled'=>'disabled', 'class'=>'text-center'])?>
                    </div>
                    <div class="attendance-value text-center">
                        <?= $form->field($model, 'casual')->textInput(['id'=>'casual', 'disabled'=>'disabled', 'class'=>'text-center'])?>
                    </div>
                    <div class="attendance-value text-center" >
                        <?= $form->field($model, 'bereavement')->textInput(['id'=>'bereavement', 'disabled'=>'disabled', 'class'=>'text-center'])?>
                    </div>
                    <div class="attendance-value text-center" >
                        <?= $form->field($model, 'nocontact')->textInput(['id'=>'nocontact', 'disabled'=>'disabled', 'class'=>'text-center'])?>
                    </div>
                    <div class="attendance-value text-center" >
                        <?= $form->field($model, 'late')->textInput(['id'=>'late', 'disabled'=>'disabled', 'class'=>'text-center'])?>
                    </div>
                    <div class="attendance-value text-center" >
                        <?= $form->field($model, 'other')->textInput(['id'=>'other', 'disabled'=>'disabled', 'class'=>'text-center']) ?>
                    </div>

                    <?= $form->field($model, 'remarks')->textarea(['maxlength' => true], (['rows' => '6'])) ?>
                </div>
            </div>

            <?php
            Modal::begin(['header'=>'<h3 class="center">Create Employee </h3>','headerOptions'=> ['class'=> 'bg-aqua'],
                'id'=> 'modalAddEmployees','size'=>'modal-lg','options'=>['data-backdrop'=>'static','data-keyboard'=>"false",],]);
            echo '<div id="modalContentAddEmployees"></div>';

            Modal::end();
            ?>

            <?php 
            Modal::begin([
                'header'=>'<h3 class="center"> <div class="glyphicon glyphicon-list-alt"></div> ' .Html::encode($this->title). '</h3>',
                'id'=> 'modalAddAttendanceType',
                'size'=>'modal-lg',
                ]);
            echo '<div id="modalContentAddAttendanceType"></div>';

            Modal::end();
            ?>  

            <!--?= $form->field($model, 'Created')->textInput() ?-->


            <div class="col-xs-12">
                <div class="form-group pull-right">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'btn-save']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
<!--?php Pjax::end()?-->
<?php $script = <<< JS
$('#btn-save').click(function(){
    $('#vacation').removeAttr('disabled');
    $('#sickleave').removeAttr('disabled');
    $('#casual').removeAttr('disabled');
    $('#bereavement').removeAttr('disabled');
    $('#nocontact').removeAttr('disabled');
    $('#late').removeAttr('disabled');
    $('#other').removeAttr('disabled');
    calcDate();
});
$('#attendance_startdate').on('change',function(){
    calcDate()
});
$('#attendance_enddate').on('change',function(){
    calcDate()
});
$('#attendance_type').on('change',function(){
    calcDate()
})
function calcDate(){
    var startDate = $('#attendance_startdate').attr('value');
    var endDate = $('#attendance_enddate').attr('value');
    var partsStart = startDate.split('-');
    var partsEnd = endDate.split('-');
    var startDateFormat = new Date(partsStart[0],partsStart[1]-1,partsStart[2]);
    var endDateFormat = new Date(partsEnd[0], partsEnd[1]-1,partsEnd[2]);
    mydate = (((endDateFormat - startDateFormat)/86400000)+ 1);

    $('#vacation').attr('value',0);
    $('#sickleave').attr('value', 0);
    $('#casual').attr('value', 0);
    $('#nocontact').attr('value', 0);
    $('#bereavement').attr('value', 0);
    $('#late').attr('value', 0);
    $('#other').attr('value', 0);

    if($('#attendance_type').select2("val") == 1){
        $('#vacation').attr('value',-mydate);
        var calcdate = $('#vacation').attr('value');
    }

    if($('#attendance_type').select2("val") == 2){
        $('#sickleave').attr('value',-((mydate)));
        var calcdate = $('#sickleave').attr('value');
    }

    if($('#attendance_type').select2("val") == 3){
        $('#sickleave').attr('value',-((mydate)/2));
        var calcdate = $('#sickleave').attr('value');
    }

    if($('#attendance_type').select2("val") == 4){
        $('#casual').attr('value', -(mydate));
        var calcdate = $('#casual').attr('value');
    }

    if($('#attendance_type').select2("val") == 5){
        $('#casual').attr('value', (-(mydate)/2));
        var calcdate = $('#casual').attr('value');
    }

    if($('#attendance_type').select2("val") == 6){
        $('#nocontact').attr('value', (-(mydate)));
        var calcdate =  $('#nocontact').attr('value');
    }

    if($('#attendance_type').select2("val") == 7){
        $('#late').attr('value', (mydate));
        var calcdate =  $('#late').attr('value');
    }

    if($('#attendance_type').select2("val") == 8){
        $('#other').attr('value', (mydate));
        var calcdate =  $('#other').attr('value');
    }


    if($('#attendance_type').select2("val") == 9){
        $('#bereavement').attr('value', (mydate));
        var calcdate =  $('#bereavement').attr('value');
    }
    $('#total_days').attr('value', Math.abs(calcdate));

    if(isNaN(mydate)){
        $('#total_days').attr('value', 'Invalid Date');
    }
    if($('#attendance_startdate').val() > $('#attendance_enddate').val()){
        $('#btn-save').attr('disabled','disabled');
        $('#total_days').attr('value', 'Invalid Date');
    }else{
        $('#btn-save').removeAttr('disabled')
    }
}
JS;
$this->registerJS($script);
?>