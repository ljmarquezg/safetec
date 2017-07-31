<?php

use yii\helpers\Html;
use yii\web\ForbiddenHttpException;

/* @var $this yii\web\View */
/* @var $model backend\models\Department */

$this->title = 'Create Department';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create row">

    <div class="col-sm-3 col-xs-12 text-center">
    <i class="big-icon fa-5x ion ion-briefcase text-center"></i>
    </div>
    <div class="col-sm-9 col-xs-12">
    	<?= $this->render('_form', [
	        'modelDepartment' => $modelDepartment,
    	]) ?>
    	</div>

</div>

<?php $scriptDepartment = <<< JS
//$('#modalAddDepartment .close').addClass('hide');
//$('#modalAddDepartment .close').removeAttr('data-dismiss');
//$('.closemodal').removeClass('hide');
//$('.closemodal').click(function(){
//    $('#modalAddDepartment').modal('hide');
//})
//$('.close').click(function(){
  //  $('#modalAddDepartment').modal('hide');
//})

$('form#createmodal-department').on('beforeSubmit', function(e)
    {
        var departmentName = $('#department-description').val();
        $('form#createmodal-department button.btn.btn-success').attr('disabled', true);
        //alert (departmentName)
        var \$form = $(this);
        $.post(
        \$form.attr("action"), 
        \$form.serialize()
        )
        .done(function(result){
            if(result==1){
                $(document).find('#modalAddDepartment').modal('hide');
                $(\$form).trigger("reset");
                $('#message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '+ departmentName +' Saved.</h4>New department has been Successfully created.</div>');
                //$.pjax.reload({container: '#departmentGrid'});
            }else{
                $('#message').html(result); 
            }
        }).fail(function(){
            console.log("server error");
        });
        return false;
    });

JS;
$this->registerJs($scriptDepartment);
?>