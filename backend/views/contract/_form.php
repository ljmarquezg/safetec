<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
//use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use bupy7\cropbox\Cropbox;
use yii\imagine\Image;
use yii\web\JsExpression;
use backend\models\customer\Customer;
use backend\models\customer\CustomerBranch;
use backend\models\contract\ContractPeriod;
use kartik\depdrop\DepDrop;
/* @var $this yii\web\View */
/* @var $model backend\models\contract\Contract */
/* @var $form yii\widgets\ActiveForm */

// The controller action that will render the list
$urlCustomer = \yii\helpers\Url::to(['/customer/customer-list']);
$customerDesc = empty($model->id_customer) ? '' : Customer::findOne($model->id_customer)->customer_name;

$urlCustomerBranch = \yii\helpers\Url::to(['/customer-branch/customer-branch-list-dependent']);
$customerBranchDesc = empty($model->id_customer_branch) ? '' : CustomerBranch::findOne($model->id_customer_branch)->customer_branch_name;

$urlContractPeriod = \yii\helpers\Url::to(['/contract-period/contract-period-list']);
$contractPeriodDesc = empty($model->id_contract_period) ? '' : ContractPeriod::findOne($model->id_contract_period)->contract_period;
?>
<?php
    $customer_image =  Yii::$app->params['customer_image'];
    /*if(!is_null($model->id_customer)){
        //$imagePath = $model->image;
        Yii::$app->db->createCommand("SELECT image FROM customer WHERE id_customer = $model->id_customer"  );
        $imagePath = $imageQuery->queryScalar();
        if(is_null($imagePath) or $imagePath ==''){*/
            $imagePath = $customer_image;
        /*}else{
            $imagePath = $imagePath;
        }
    }else{
        $imagePath = $customer_image;
    }*/

?>
<?php $dataCustomer = ArrayHelper::map(Customer::find()->all(), 'id_customer', 'customer_name')?>
<?php $dataCustomerBranch = ArrayHelper::map(CustomerBranch::find()->all(), 'id_customer_branch', 'customer_branch_name')?>
<?php $dataContractPeriod = ArrayHelper::map(ContractPeriod::find()->all(), 'id_contract_period', 'contract_period', 'contract_period_month')?>

<div class="contract-form">
    <div id="message">
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-12 col-xs-no-padding">
        <div class="customer-form">
            <div class="col-md-12 col-xs-no-padding">
                <h1 class="widget-user-title bg-primary"><?= Html::encode($this->title) ?></h1>
                <div class="box box-widget widget-user view ">
                    <div class="widget-user-header box">
                        <div class="widget-user-image">
                            <img id="customer_image" class="img-circle" src="<?php echo $imagePath; ?>">
                            <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                                <?= $form->field($model, 'id_contract_status')->checkbox(array('id'=>'customer-'.$model->id_customer_branch,'class'=>'onoffswitch-checkbox','label' => '','data-status'=>$model->id_contract_status,'value'=>$model->id_contract_status,))?>
                        </div>
                    </div>
                    <div class="widget-header-input">
                        <h2 class="widget-user-username">
                               <?= $form->field($model, 'contract_number')->textInput(['maxlength' => true, 'class'=>'text-left'])?>
                        </h2>
                        <h2 class="widget-user-username"> <?= $form->field($model, 'purchace_order')->textInput(['maxlength' => true, 'class'=>'text-left']) ?>
                       </h2>
                        <h2 class="widget-user-username">
                    <?= 
                    $form->field($model, 'id_customer')->widget(Select2::classname(), ['id'=> 'id_customer', 'data' => $dataCustomer,'language' => 'en','initValueText' => $customerDesc, 'options' => ['placeholder' => 'Select ...'],'addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-android-person"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/customer/createmodal'),'id'=>'AddCustomer', 'class' => 'btn btn-success modalButton','title' => 'Create Customer', 'data-toggle' => 'tooltip']),'asButton' => true,],'pluginOptions' => ['allowClear' => true],],'pluginEvents' => ["change" => 'function() { var data_value = $(this).attr("id"); var data_id = $("#contract-id_customer").select2("val");alert(data_id);}',
                        ],'pluginOptions' => ['minimumInputLength' => 0,'ajax' => ['url' => $urlCustomer,'dataType' => 'json','data' => new JsExpression('function(params) { return {q:params.term}; }')],'pjaxSettings' => ['options' => ['id' => 'id_customer']],'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),'templateResult' => new JsExpression('function(city) { return city.text; }'),'templateSelection' => new JsExpression('function (city) { return city.text; }'),'allowClear' => true,],])->label('Select main customer')?>
                        </h2>
                        
                        <div class="widget-user-username" style="margin-top:-27px">

                        
                        <?= $form->field($model, 'id_customer_branch')->widget(DepDrop::classname(), [
                            'data'=> $dataCustomerBranch,
                            'options' => ['placeholder' => 'Select Branch...'],
                            'type' => DepDrop::TYPE_SELECT2,
                            'class'=>'input-group input-group-md group-contract-id_customer select2-bootstrap-append',
                            'select2Options'=>[
                                'disabled'=>true,
                                'pluginOptions'=>['allowClear'=>true],
                                'addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-android-people"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/customer-branch/createmodal'),'id'=>'AddCustomerBranch', 'class' => 'btn btn-success modalButton','title' => 'Create Branch', 'data-toggle' => 'tooltip']),'asButton' => true,],],
                                ],
                            'pluginOptions'=>[
                                'depends'=>['contract-id_customer'],
                                'url' => $urlCustomerBranch,
                                'loadingText' => 'Loading Customer Branches...',
                            ]
                        ]);
                        ?>
                        </h2>
                        </div>
                    </div>

                </div>
                
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="description-block">
                                <h5 class="description-header">

                             <?= $form->field($model, 'id_contract_period')->widget(Select2::classname(), ['id' => 'id_contract_period', 'data' => $dataContractPeriod,'language' => 'en','initValueText' => $contractPeriodDesc, 'options' => ['placeholder' => 'Select contract period...'],'addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-android-stopwatch"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/contract-period/createmodal'),'id'=>'AddContractPeriod', 'class' => 'btn btn-success modalButton','title' => 'Create Contract Period', 'data-toggle' => 'tooltip']),'asButton' => true,],'pluginOptions' => ['allowClear' => true],],'pluginEvents' => ["change" => 'function() { var data_id = $(this).select2("val");alert(data_id)}',],'pluginOptions' => ['minimumInputLength' => 0,'ajax' => ['url' => $urlContractPeriod,'dataType' => 'json','dataContractPeriod' => new JsExpression('function(params) { return {q:params.term}; }')],'pjaxSettings' => ['options' => ['id' => 'id_contract_period']],'allowClear' => true,],])->label('Select contract period')?>
                                </h5>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="description-block">
                                <h5 class="description-header">  <?= $form->field($model, 'contract_start')->widget(DateControl::classname(), ['value' =>  $model->contract_start,'ajaxConversion' => true,'displayFormat' => 'dd-MM-yyyy','saveFormat' => 'yyyy-MM-dd','options' => ['pluginOptions' => ['autoclose' => true], 'class'=>'bordered']]) ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="description-block">
                                <h5 class="description-header">  <?= $form->field($model, 'contract_expire')->widget(DateControl::classname(), ['value' =>  $model->contract_expire,'ajaxConversion' => true,'displayFormat' => 'dd-MM-yyyy','saveFormat' => 'yyyy-MM-dd',/*'disabled' => true,*/'options' => ['pluginOptions' => ['autoclose' => true], 'class'=>'bordered']]) ?>
                                </h5>
                            </div>
                        </div>

                        

                        <div class="col-lg-12 col-xs-no-padding">
                            <div class="description-block">
                                <h5 class="description-header">
                                 <?= $form->field($model, 'contract_information')->textarea(['maxlength' => true])->label('Contract Information', ['class'=>'tex-left']) ?>
                                </h5>
                            </div>
                        </div>                            
                            

                        <div class="row">
                            <?php 
                            if(!isset($model->customer_ID)){

                            }else{
                                if(Yii::$app->user->can("attendance")) {
                                    echo $this->render('_expandable_attendance', [
                                        'model' => $model,
                                        ]);
                                };
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

     <?php 
    Modal::begin([
        'headerOptions'=> ['class'=>'bg-green',],
        'header'=>'<h3 class="text-center"> Create Customer </h3>',
        'id'=> 'modalAddCustomer',
        'size'=>'modal-lg',
        'options'=>['data-backdrop'=>'static',
        'data-keyboard'=>"false",]
        ]);
    echo '<div id="modalContentAddCustomer"></div>';

    Modal::end();
    ?>   


    <?php 
    Modal::begin([
        'headerOptions'=> ['class'=>'bg-green',],
        'header'=>'<h3 class="text-center"> Create Branch </h3>',
        'id'=> 'modalAddCustomerBranch',
        'size'=>'modal-lg',
        'options'=>['data-backdrop'=>'static',
        'data-keyboard'=>"false",]
        ]);
    echo '<div id="modalContentAddCustomerBranch"></div>';

    Modal::end();
    ?>

    <?php 
    Modal::begin([
        'headerOptions'=> ['class'=>'bg-green',],
        'header'=>'<h3 class="text-center"> Create Contract Period </h3>',
        'id'=> 'modalAddContractPeriod',
        'size'=>'modal-lg',
        'options'=>['data-backdrop'=>'static',
        'data-keyboard'=>"false",]
        ]);
    echo '<div id="modalContentAddContractPeriod"></div>';

    Modal::end();
    ?>   
    <?php ActiveForm::end(); ?>



<?php 
$datePickerCalc = <<< JS
$('#contract-id_contract_period').on('change',function(periodValue){
    getPeriod(periodValue)
})

$("#contract-contract_start").change(function(){
    getPeriod();
    changeDate();
})

$("#contract-contract_expire").change(function(){
    getPeriod();
    changeDateExpire()
})

function getPeriod(){
    alert($('#contract-id_contract_period').val());

    var id_contract_period = $('#contract-id_contract_period').val();
    $.get('/contract-period/contract-period-info', {id_contract_period}, function(dataContractPeriod){
    var dataContractPeriod = $.parseJSON(dataContractPeriod);

    periodValue = dataContractPeriod.contract_period_month
    
    if ($("#contract-contract_start").val != null){
        changeDate(periodValue);
    }

    if ($("#contract-contract_start").val != null){
        changeDateExpire(periodValue)
    }
    //$('#phone').html(data.customer_phone);
    })
}


function changeDate(){
        alert(periodValue);
        var date = $("#contract-contract_start").val()
        alert(date);
        var fecha = new Date(date);
        fecha.setMonth(fecha.getMonth());
        fecha.setDate(fecha.getDate()+1);
        var expire_date = new Date(fecha.setMonth(fecha.getMonth()+periodValue));

        $("#contract-contract_expire-disp").datepicker("setDate", expire_date, {
            dateFormat: 'dd-mm-yy',
        })

        dateFormat = new Date(expire_date);
        dateFormat = new Date (dateFormat.setMonth(dateFormat.getMonth()+1))

        $("#contract-contract_expire").attr("value", dateFormat.getFullYear() + "-" + (dateFormat.getMonth() < 10 ? '0' : '') + dateFormat.getMonth() + "-" +  (dateFormat.getDate() < 10 ? '0' : '') + dateFormat.getDate())

        dateFormatEnd = new Date(expire_date);
        dateFormatEnd = new Date (dateFormat.setMonth(dateFormatEnd.getMonth()+1))

        $("#contract-contract_expire").attr("value", dateFormatEnd.getFullYear() + "-" + (dateFormatEnd.getMonth() < 10 ? '0' : '') + dateFormatEnd.getMonth() + "-" +  (dateFormatEnd.getDate() < 10 ? '0' : '') + dateFormatEnd.getDate())

        $("#contract-contract_expire-disp").attr("value", (dateFormatEnd.getDate() < 10 ? '0' : '') + dateFormatEnd.getDate() + "-" + (dateFormatEnd.getMonth() < 10 ? '0' : '') + dateFormatEnd.getMonth() + "-" + dateFormatEnd.getFullYear() )

        $("#contract-contract_expire-disp").datepicker("setDate",$("#contract-contract_expire").val());
    
}


function changeDateExpire(){
    //alert(periodValue);
        var date = $("#contract-contract_expire").val()
        var fecha = new Date(date);
        fecha.setMonth(fecha.getMonth());
        fecha.setDate(fecha.getDate()+1);
        var start_date = new Date(fecha.setMonth(fecha.getMonth()-periodValue));
        alert (start_date);

        $("#contract-contract_start-disp").datepicker("setDate", start_date, {
            dateFormat: 'dd-mm-yy',
        })

        dateFormat = new Date(start_date);
        dateFormat = new Date (dateFormat.setMonth(dateFormat.getMonth()+1))

        $("#contract-contract_start").attr("value", dateFormat.getFullYear() + "-" + (dateFormat.getMonth() < 10 ? '0' : '') + dateFormat.getMonth() + "-" +  (dateFormat.getDate() < 10 ? '0' : '') + dateFormat.getDate())

        dateFormatEnd = new Date(start_date);
        dateFormatEnd = new Date (dateFormat.setMonth(dateFormatEnd.getMonth()+1))

        $("#contract-contract_start").attr("value", dateFormatEnd.getFullYear() + "-" + (dateFormatEnd.getMonth() < 10 ? '0' : '') + dateFormatEnd.getMonth() + "-" +  (dateFormatEnd.getDate() < 10 ? '0' : '') + dateFormatEnd.getDate())

        $("#contract-contract_start-disp").attr("value", (dateFormatEnd.getDate() < 10 ? '0' : '') + dateFormatEnd.getDate() + "-" + (dateFormatEnd.getMonth() < 10 ? '0' : '') + dateFormatEnd.getMonth() + "-" + dateFormatEnd.getFullYear() )

        $("#contract-contract_startdisp").datepicker("setDate",$("#contract-contract_expire").val()); 
}


JS;
$this->registerJS($datePickerCalc);
?>
<script>

</script>