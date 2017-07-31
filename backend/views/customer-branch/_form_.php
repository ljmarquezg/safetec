<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
//use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use backend\models\customer\Customer;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use bupy7\cropbox\Cropbox;
use yii\imagine\Image;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
/*******
* View
******/

// The controller action that will render the list
$urlCustomer = \yii\helpers\Url::to(['/customer/customer-list']);
// Get the initial city description
$customerDesc = empty($model->id_customer) ? '' : Customer::findOne($model->id_customer)->customer_name;
?>
<?php
    $customer_image =  Yii::$app->params['customer_image'];
    if(!is_null($model->id_customer)){
        $imageQuery = Yii::$app->db->createCommand("SELECT image FROM customer WHERE id_customer = $model->id_customer"  );
        $imagePath = $imageQuery->queryScalar();
        if(is_null($imagePath) or $imagePath ==''){
            $imagePath = $customer_image;
        }else{
            $imagePath = $imagePath;
        }
    }else{
        $imagePath = $customer_image;
    }
?>
<div class="customer-branch-form">
    <div id="message">

    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-12 col-xs-no-padding">
        <?php $dataCustomer = ArrayHelper::map(Customer::find()->all(), 'id_customer', 'customer_name')?>

        <div class="customer-form">
            <div class="col-md-12 col-xs-no-padding">
                <h1 class="widget-user-title bg-green"><?= Html::encode($this->title) ?></h1>
                <div class="box box-widget widget-user view ">
                    <div class="widget-user-header bg-green-active col-lg-12">
                        <div class="widget-user-image">
                            <img id="customer_image" class="img-circle" src="<?php echo $imagePath; ?>">
                            <button type="button" class="btn btn-default btn-block btn-file" id="deleteImage"><i class="glyphicon glyphicon-trash"></i>   <!--span class="hidden-xs">Select Photo</span--></button>
                            <button type="button" class="btn btn-default y btn-block btn-file modalButton" id="UserImage" data-toggle="modal" data-target="#userImage"><i class="glyphicon glyphicon-camera"></i>   <!--span class="hidden-xs">Select Photo</span--></button>
                            <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                                <!--label class="control-label">Status</label-->
                                <?= $form->field($model, 'id_customer_branch_status')->checkbox(array('id'=>'customer-'.$model->id_customer_branch,'class'=>'onoffswitch-checkbox','label' => '','data-status'=>$model->id_customer_branch_status,'value'=>$model->id_customer_branch_status,))?>
                                <!--script type="text/javascript">
                                    var $ = jQuery.noConflict();
                                    var loadSwitch = 0
                                    if (loadSwitch == 0)
                                        {$(window).load(function(){$(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')})}
                                </script-->
                        </div>
                    </div>
                    <div class="widget-header-input">
                        <!--h5 class="widget-user-desc"><i class="fa ion ion-pound"></i> <?= $model->id_customer ?></h5><h5 class="widget-user-desc"><?php /*$statusQuery = Yii::$app->db->createCommand("SELECT customer FROM id_customer_status WHERE id_customer =    "  );$status = $statusQuery->queryScalar();if($status == 1){echo '<i class="fa fa-toggle-on"></i> ';}else{echo '<i class="fa fa-toggle-off"></i> ';}echo $status;*/?></h5-->
                        <h2 class="widget-user-username">
                            <!--div class="description-block text-left">Select main customer</div-->

                            <?= 
                    $form->field($model, 'id_customer')->widget(Select2::classname(), ['data' => $dataCustomer,'language' => 'en','initValueText' => $customerDesc, 'options' => ['placeholder' => 'Select Attendance Customer...'],'addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-android-person"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/customer/createmodal'),'id'=>'AddCustomer', 'class' => 'btn btn-success modalButton','title' => 'Create Employee', 'data-toggle' => 'tooltip']),'asButton' => true],'pluginOptions' => ['allowClear' => true],],'pluginEvents' => ["change" => 'function() { var data_id = $(this).attr("id");/*alert(data_id);*/}',],'pluginOptions' => ['minimumInputLength' => 0,'ajax' => ['url' => $urlCustomer,'dataType' => 'json','data' => new JsExpression('function(params) { return {q:params.term}; }')],'pjaxSettings' => ['options' => ['id' => 'id_customer']],'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),'templateResult' => new JsExpression('function(city) { return city.text; }'),'templateSelection' => new JsExpression('function (city) { return city.text; }'),'allowClear' => true,],])?>


                        </h2><!--h5 class="widget-user-desc"><i class="fa fa-envelope"></i>Email <?= $form->field($model, 'customer_branch_name')->textInput(['maxlength' => true])->label(false) ?> </h5><h5 class="widget-user-desc"><i class="fa ion ion-location"></i>Address <?= $form->field($model, 'customer_branch_address')->textInput(['maxlength' => true])->label(false) ?></h5><h5 class="widget-user-desc"> <i class="fa ion ion-briefcase"></i--><!--?php $customerQuery = Yii::$app->db->createCommand("SELECT description FROM customer WHERE id_customer = $model->id_customer_customer"  );$customer = $customerQuery->queryScalar();echo $customer;?></h5-->

                        <div class="widget-user-username" style="margin-top:-27px">
                            <h3 class="description-block text-left">
                                <?= $form->field($model, 'customer_branch_name')->textInput(['maxlength' => true, 'class'=>'text-left']) ?>
                            </h3>
                        </div>
                            <div class="widget-user-username" style="margin-top:-27px">
                            <h3 class="description-block text-left">
                               <?= $form->field($model, 'customer_branch_address')->textInput(['maxlength' => true, 'class'=>'text-left'])?>
                            </h3>
                        </div>

                    </div>

                </div>
                <div class="box-footer">
                    <div class="row">

                        <div class="col-md-4 col-sm-12">
                            <div class="description-block">
                                <h5 class="description-header">  <?= $form->field($model, 'customer_branch_phone')->textInput(['maxlength' => true, 'class'=>'text-center'])?></h5>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="description-block">
                                <h5 class="description-header"> <?= $form->field($model, 'customer_branch_email')->textInput(['maxlength' => true])?></h5>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="description-block">
                                <h5 class="description-header">
                                <?= $form->field($model, 'customer_branch_fax')->textInput(['maxlength' => true, 'class'=>'text-center'])?>
                                </h5>
                            </div>
                        </div>


                            <div class="col-md-3 col-sm-12">
                                <div class="description-block">
                                <h5 class="description-header">
                                        <?= $form->field($model, 'customer_branch_country')->textInput(['maxlength' => true, 'class'=> 'required']) ?>
                                        </h5>
                                </div>
                            </div>

                            <div class="col-md-3 col-xs-12">
                                <div class="description-block">
                                <h5 class="description-header">
                                    <?= $form->field($model, 'customer_branch_state')->textInput(['maxlength' => true]) ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                                <div class="description-block">
                                <h5 class="description-header">
                                    <?= $form->field($model, 'customer_branch_zip')->textInput(['maxlength' => true]) ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                                <div class="description-block">
                                <h5 class="description-header">
                                    <?= $form->field($model, 'customer_branch_zone')->textInput(['maxlength' => true]) ?>
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
    <div id="userImage" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <?php echo $form->field($modelCustomer, 'file')->widget(Cropbox::className(), ['attributeCropInfo' => 'crop_info',]);?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div> 
<?php ActiveForm::end(); ?>

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

$js = <<< JS
$('#customerbranch-id_customer').on('change',function(){
    //alert($('#customerbranch-id_customer').val());
    var id_customer = $(this).val();
    $.get('/customer/customer-info', {id_customer : id_customer}, function(data){
        var data = $.parseJSON(data);
    //$('#email').html(data.customer_email);
    //$('#phone').html(data.customer_phone);
        if (data.image == null || data.image == ''){
            $('#customer_image').attr('src', '{$customer_image}');
        }else{
            $('#customer_image').attr('src', data.image);
        }
    })
})
JS;
// Call the above js script in your view
$this->registerJs($js);

?>

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
            $('.customer-form .img-circle').attr('src', croppedImage );
        }

        $('#deleteImage').on('click',function(){
            $('.customer-form .img-circle').attr('src','/images/elements/userprofile-gray.png');
        })

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>