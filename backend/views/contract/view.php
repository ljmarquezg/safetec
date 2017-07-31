<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use backend\models\customer\Customer;
use backend\models\customer\CustomerBranch;
use backend\models\contract\ContractPeriod;
use backend\models\contract\ContractStatus;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\Contract */

$this->title = '<i class="fa fa-folder-open"></i>Contract Information';
$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php   $customerName = Customer::findOne($model->id_customer)->customer_name;
        $customerBranch = CustomerBranch::findOne($model->id_customer_branch)->customer_branch_name;
        $contractStatus = ContractStatus::findOne($model->id_contract_status)->contract_status;
        if ($model->id_contract < 100){
            if($model->id_contract < 10){
                $idContract = '00'.$model->id_contract;
            }else{
                $idContract = '0'.$model->id_contract;
            }
        }else{
                $idContract = $model->id_contract;
        }

        $contractPeriod = ContractPeriod::findOne($model->id_contract_period)->contract_period;

        $today = date('Y-m-d');
        /*$compareDate= strtotime ( '+3 month' , strtotime ( $today ) ) ;
        $compareDate= date ( 'Y-m-d' , $compareDate);*/

        $datetime1 = date_create($today);
        $datetime2 = date_create($model->contract_expire);
        $expireDays = date_diff($datetime1, $datetime2);
        $expireDays = $expireDays->format('%R%a');
         
        if ($expireDays > 0){
            
            $contractbackground =' bg-aqua-active';
            $expireBadge =' bg-aqua-active';
            $contractAlert = '';

            if($expireDays > 45){
                $contractbackground = ' bg-yellow';
                $expireBadge = ' bg-yellow';
                $contractAlert = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4><h5> Contract Number: '. $model->contract_number .' '. $expireDays.'</h5></div>';
            }

            $expireDays = $expireDays. ' days';
            $expireDays = ' - its about to expire in '. $expireDays. 'days';
        }else{
            $contractbackground =' bg-red-active';
            $expireBadge =' bg-red-active';
            $expireDays = ' Expired '. $expireDays. ' days ago';
            /*$contractAlert = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4><h5> Contract Number: '. $model->contract_number .' '. $expireDays.'</h5><h5> Please Inactive this contract or Renew  it.</h5></div>';*/
            $contractAlert = '<div class="box box-danger box-solid"><div class="box-header with-border"><i class="icon fa fa-ban"></i> Alert!<div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body bg-red-active"><p> Contract Number: <b sytle="text-decoration:underline">'. $model->contract_number .'</b> remains ' .$contractStatus.' and <b>'. $expireDays.'</b></p><h5> Please: </h5><div id="inactive-text" style="display:inline">'. Html::submitButton('Inactive', ['class' => 'btn btn-primary', 'id'=>'btn-inactive']).' or </div>'. Html::a('Renew it', ['renew', 'id_customer' => $model->id_customer, 'id_customer_branch'=> $model->id_customer_branch, 'id_contract_period'=>$model->id_contract_period ], ['class' => 'btn btn-primary']).'</div></div>';
        }
        
?>

          
    
<div class="contract-view">
    <h1><?= $this->title ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_contract], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_contract], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<?php $form = ActiveForm::begin(['id'=>'contract-view']); ?>
<?= $form->field($model, 'id_contract_status')->checkbox(array('id'=>'customer-'.$model->id_customer_branch,'class'=>'onoffswitch-checkbox','label' => '','data-status'=>$model->id_contract_status,'value'=>$model->id_contract_status,))?>
<div class="col-lg-12">
<?= $contractAlert ?>
</div>
<?php $form = ActiveForm::end()?>
<div class="col-lg-12" id="message">
</div>

<?php Pjax::begin(['id'=>'employeesGrid'])?>
<div id="loading">
    <p><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></p>
</div>
<div class="col-md-6">
      <!-- Box Comment -->
      <div class="box box-widget">
        <div class="box-header with-border no-padding">
          <div class="box box-widget widget-user-2" style="margin-bottom: 0">
            <div class="widget-user-header <?= $contractbackground ?>">
              <div class="widget-user-image">
                <!--img class="img-circle" src="./dist/img/user6-128x128.jpg" alt="User Avatar"-->
              </div>
              <h3 class="widget-user-username"><i class="fa fa-file"></i><?= $model->contract_number?> 
              <h5 class="widget-user-desc"><i class="fa ion ion-android-time"></i> <?= $contractPeriod?> Contract</h5>
              <h5 class="widget-user-desc"><i class="fa ion ion-pound"></i> <?= $idContract ?></h5>
              <h5 class="widget-user-desc"><i class="fa ion ion-home"></i> <?= $customerName ?></h5>
              <h5 class="widget-user-desc"><i class="fa ion ion-merge"></i><?= $customerBranch ?></h5>
              <h5 class="widget-user-desc"><i class="fa ion ion-toggle"></i><?= $contractStatus ?></h5>
            </div>
          </div>
          <div class=""> <!--box-tools-->
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"> </i> Contract Details
            </button>
          </div>
        </div>
        <div class="box-body" style="display: block;">
        <ul class="nav nav-stacked">
                <li><a href="#">Contract Start: <span class="pull-right"> <?= $model->contract_start?></span></a></li>
                <li><a href="#">Contract Expire: <span class="pull-right"><?= $model->contract_expire?> </span></a></li>
                <li><a href="#">Expire in: <span class="pull-right badge <?= $expireBadge ?>"><?= $expireDays ?></span></a></li>
              </ul>
        </div>
        </div>
      </div>
<?php Pjax::end()?>
    <!--?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_contract',
            'id_customer',
            'id_customer_branch',
            'contract_number',
            'contract_start',
            'contract_expire',
            'contract_information',
            'id_contract_period',
            'id_contract_status',
            'created_date',
            'updated_date',
            'purchace_order',
        ],
    ]) ?-->


</div>
<?php
$submit = <<< JS


function showLoading() {
    $("#loading").show();
}

function hideLoading() {
    $("#loading").hide();
}
$('form#contract-view').on('beforeSubmit', function(e)
    {
        $('#btn-inactive').prop("disabled",true);
        showLoading();
        //var contractNumber = $('#contract-contract_number').val();
        //alert (contract-contract_number)
        var \$form = $(this);
        $.post(
        \$form.attr("action"), 
        \$form.serialize()
        )
        .done(function(result){
            if(result==1){
                $('#inactive-text').hide();
                //$(document).find('#modalAddContract').modal('hide');
                //$(\$form).trigger("reset");
                $.pjax.reload({container: '#employeesGrid'});
                $('#message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>  Saved.</h4>Contract Number: <?php echo $model->contract_number ?> status: Inactive</div>')
            }else{
                //$('#message').html(result); 
                $('#message').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i>  Error.</h4>An error occurred. Please contact your system administrator</div>')
                $('#btn-inactive').prop("disabled",false);
            }
        }).fail(function(){
            console.log("server error");
        });
        hideLoading();
        return false;
    });
JS;
$this->registerJS($submit);
?>