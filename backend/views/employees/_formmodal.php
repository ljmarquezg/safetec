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
/* @var $modelEmployees backend\models\employees\Employees */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
/*******
* View
******/

// The controller action that will render the list
$url = \yii\helpers\Url::to(['department-list']);
// Get the initial city description
$departmentDesc = empty($modelEmployees->id_department) ? '' : Department::findOne($modelEmployees->id_department)->description;

?>

<div class="employees-form">
    <div id="message">
    </div>

    <?php $form = ActiveForm::begin(['id'=>$modelEmployees->formName(),'options' => ['enctype'=>'multipart/form-data'],]); ?>
    <div id="userImage" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <?php echo $form->field($modelEmployees, 'file')->widget(Cropbox::className(), ['attributeCropInfo' => 'crop_info',]);?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" >Close</button>
                </div>
            </div>

        </div>
    </div>   
    <div class="col-xs-12 col-xs-no-padding">

        <?php $data = ArrayHelper::map(Department::find()->all(), 'id_department', 'description')?>

        <div class="employees-form">
            <div class="col-md-12 col-xs-no-padding">
                <div class="box box-widget widget-user view ">
                    <div class="widget-user-header bg-aqua-active">
                        <div class="widget-user-image">
                            <!-- Modal -->
                            <img class="img-circle" src="<?php if (is_Null($modelEmployees->image) or $modelEmployees->image == '' ){
                                echo '/images/elements/userprofile-gray.png';
                            }else{
                                echo $modelEmployees->image;
                            } ?>" alt="User Avatar">
                            <button type="button" class="btn btn-default btn-block btn-file" id="deleteImage"><i class="glyphicon glyphicon-trash"></i>   <!--span class="hidden-xs">Select Photo</span--></button>
                            <button type="button" class="btn btn-default y btn-block btn-file modalButton" id="UserImage" data-toggle="modal" data-target="#userImage"><i class="glyphicon glyphicon-camera"></i>   <!--span class="hidden-xs">Select Photo</span--></button>


                            <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                                <!--label class="control-label">Status</label-->
                                <?= $form->field($modelEmployees, 'employees_status')->checkbox(array('id'=>'employees-'.$modelEmployees->id_employees,
                                'class'=>'onoffswitch-checkbox','label' => '','data-status'=>$modelEmployees->id_employees,'value'=>$modelEmployees->id_employees,))?>
                                <script type="text/javascript">
                                    </script>

                                </div>
                            </div>
                            <!--Left - Container-->
                            <!--Right Container-->
                            <div class="widget-header-input">
                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <?= $form->field($modelEmployees, 'employees_name')->textInput(['maxlength' => true, 'class'=>'text-left'])?>
                                    </h3>
                                </div>

                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <h5 class="description-header"> <?= $form->field($modelEmployees, 'employees_email')->input('email',['maxlength' => true,'class'=>'text-left']) ?></h5>
                                    </h3>
                                </div>

                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <h5 class="description-header"> <h5 class="description-header"><?= $form->field($modelEmployees, 'employees_phone')->textInput(['maxlength' => true,'class'=> 'text-left']) ?></h5></h5>
                                    </h3>
                                </div>

                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="divider"></div>
                                <div class="col-md-6 col-sm-12">
                                    <?= $form->field($modelEmployees, 'employees_startdate')->widget(DateControl::classname(), ['value' =>  $modelEmployees->employees_startdate,'ajaxConversion' => true,'displayFormat' => 'dd-MM-yyyy','saveFormat' => 'yyyy-MM-dd','options' => ['pluginOptions' => ['autoclose' => true]]]) ?>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <?= $form->field($modelEmployees, 'id_employees_department')->widget(Select2::classname(), [
                                    'data' => $data,'language' => 'en','initValueText' => $departmentDesc, 'options' => ['placeholder' => 'Search for a Department ...'],'id'=>'id_department','addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-briefcase"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/department/createmodal'),'id'=>'AddDepartment', 'class' => 'btn btn-success modalButton','title' => 'Create Department', 'data-toggle' => 'tooltip']),'asButton' => true],'pluginOptions' => ['allowClear' => true],],'pluginOptions' => ['minimumInputLength' => 1,'ajax' => ['url' => $url,'dataType' => 'json','data' => new JsExpression('function(params) { return {q:params.term}; }')],'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),'templateResult' => new JsExpression('function(city) { return city.text; }'),'templateSelection' => new JsExpression('function (city) { return city.text; }'),'allowClear' => true,],]);?>
                                </div>
                                <div class="col-md-3 col-xs-6 ">
                                    <div class="description-block">
                                        <?= $form->field($modelEmployees, 'employees_vacation')->textInput() ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6 ">
                                    <div class="description-block">
                                        <?= $form->field($modelEmployees, 'employees_sick')->textInput() ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6 ">
                                    <div class="description-block">
                                        <?= $form->field($modelEmployees, 'employees_casual')->textInput() ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6 ">
                                    <div class="description-block">
                                        <?= $form->field($modelEmployees, 'employees_bereavement')->textInput() ?>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group pull-right">
                                        <?= Html::submitButton($modelEmployees->isNewRecord ? 'Create' : 'Update', ['class' => $modelEmployees->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                    <?php 
                                    Modal::begin([
                                        'header'=>'<h3> <i class="ion ion-brief"></i> Create Department </h3>',
                                        'headerOptions'=>['class'=>'bg-yellow'],
                                        'id'=> 'modalAddDepartment',
                                        'size'=>'modal-md',
                                        'options'=>['data-backdrop'=>'static',
                                        'data-keyboard'=>"false",]
                                        ]);
                                    echo '<div id="modalContentAddDepartment"></div>';

                                    Modal::end();
                                    ?>  
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <script type="text/javascript">
        $(window).ready(function(){
            $('#userImage .close ').addClass('hidden')
        })

        $('#userImage .btn.btn-default ').on('click',function(){
//alert($('img').attr("src"));
croppedImage()
//alert(croppedImage);
})

        function croppedImage(){
            var croppedImage = ($('.img-thumbnail').attr("src"));
            $('.employees-form .img-circle').attr('src', croppedImage );
        }

        $('#deleteImage').on('click',function(){
            $('.employees-form .img-circle').attr('src','/images/elements/userprofile-gray.png');
        })

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>


<?php 
$js = <<< JS
$(function(){
	$('.modalButton').click(function(){
		var id = $(this).attr('id');
		$('#modal'+id).modal('show')
		.find('#modalContent'+id)
		.load($(this).attr('value'));
		$('.modal-dialog').draggable({
			handle: ".modal-header"
		});
		$('#modal'+id+ ' .modal-header .close').removeAttr('data-dismiss');
		$('#modal'+id+ ' .close').click(function () {
			var modalTitle = $('#modal'+id+' .modal-header h3').html();
			$('#modalWarningShow').append('<div id="Warning'+id+'" class="modal fade" role="dialog" data-backdrop="false"><div class="modal-dialog"><div class="modal-content "><div class="modal-header alert alert-warning"><button type="button" class="close closefirstmodal">&times;</button><!--div class="alert alert-warning alert-dismissible"--><h4><i class="icon fa fa-warning"></i> Alert!</h4><!--/div--></div><div class="modal-body"><p id="modalTitle">Close <b> '+ modalTitle + 'Form </b> without saving?</p></div><div class="modal-footer"><button type="button" class="btn btn-default confirmclosed">Yes</button><button type="button" class="btn btn-primary" data-dismiss="modal">No</button></div></div></div></div>').one()
			$('#Warning'+id+ ' button.confirmclosed').attr('id','confirmclosed'+id)
			$('#Warning'+id).modal('show');
			$('#confirmclosed'+id).click(function () {
				$('#Warning'+id).modal('hide');
				$('#modal'+id).modal('hide');
				$('#Warning'+id).remove()
			});
		});
	})
})

$('form#createmodal-employees').on('beforeSubmit', function(e)
    {
        var employeesName = $('#employees-employees_name').val();
        alert (employeesName)
        var \$form = $(this);
        $.post(
        \$form.attr("action"), 
        \$form.serialize()
        )
        .done(function(result){
            if(result==1){
                $(document).find('#modalAddemployees').modal('hide');
                $(\$form).trigger("reset");
                //$.pjax.reload({container: '#employeesGrid'});
                $('#message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '+ employeesName +' Saved.</h4>New employees has been Successfully created.</div>')
            }else{
                $('#message').html(result); 
            }
        }).fail(function(){
            console.log("server error");
        });
        return false;
    });


JS;
// Call the above js script in your view
$this->registerJs($js);
?>