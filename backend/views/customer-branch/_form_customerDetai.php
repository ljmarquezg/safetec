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
$url = \yii\helpers\Url::to(['customer-list']);
// Get the initial city description
$customerDesc = empty($model->id_customer) ? '' : customer::findOne($model->id_customer)->customer_name; 
?>
<div class="customer-branch-form">
<div id="message">

</div>

<?php $form = ActiveForm::begin(); ?>

<div class="col-xs-12" style="background-color:white">
    <?php $data = ArrayHelper::map(Customer::find()->all(), 'id_customer', 'customer_name')?>

    <div class="customer-form">
        <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user view">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-green-active">
                    <div class="widget-user-image">
                        <!--img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar"-->
                        <img class="img-circle" src="/images/elements/userprofile.png">
                        <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                        <!--label class="control-label">Status</label-->
                        <?= $form->field($model, 'id_customer_branch_status')->checkbox(array(
                            'id'=>'customer-'.$model->id_customer_branch,
                            'class'=>'onoffswitch-checkbox',
                            'label' => '',
                            'data-status'=>$model->id_customer_branch,
                            'value'=>$model->id_customer_branch,
                            )
                        )
                        ?>
                        <script type="text/javascript">
                                var $ = jQuery.noConflict();
                                var loadSwitch = 0
                                if (loadSwitch == 0){
                                $(window).load(function(){$(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')})
                                }
                        </script>
                        </div>
                    </div>
                    <div style="display: grid;">
                        <!--h5 class="widget-user-desc"><i class="fa ion ion-pound"></i> <?= $model->id_customer ?></h5-->
                        <h5 class="widget-user-desc">
                         <!--?php $statusQuery = Yii::$app->db->createCommand("SELECT customer FROM id_customer_status WHERE id_customer =    "  );
                            $status = $statusQuery->queryScalar();
                            if($status == 1){
                                echo '<i class="fa fa-toggle-on"></i> ';
                            }else{
                                echo '<i class="fa fa-toggle-off"></i> ';
                            }
                            echo $status;?-->
                        </h5>
                        <h2 class="widget-user-username">

                        <?= 
                                $form->field($model, 'id_customer')->widget(Select2::classname(), [
                                    'data' => $data,'language' => 'en',
                                    'initValueText' => $customerDesc, // set the initial display text
                                    'options' => ['placeholder' => 'Search for a customer ...'],
                                    'addon'=> ['append' => ['content' => Html::button('<div class="fa ion ion-briefcase"></div> <div class="glyphicon glyphicon-plus"></div>', ['value'=> Url::to('/customer-branch/createmodal'),'id'=>'AddCustomer', 'class' => 'btn btn-default modalButton','title' => 'Create customer', 'data-toggle' => 'tooltip']),'asButton' => true],'pluginOptions' => ['allowClear' => true],],
                                    'pluginEvents' => [
                                            "change" => 'function() { 
                                                var data_id = $(this).attr("id");
                                                alert(data_id);
                                            }',
                                        ],
                                    'pluginOptions' => [
                                    'minimumInputLength' => 1,
                                    'ajax' => [
                                        'url' => $url,
                                        'dataType' => 'json',
                                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                    ],
                                    'pjaxSettings' => [
                                        'options' => ['id' => 'id_customer'] // UNIQUE PJAX CONTAINER ID
                                        ],
                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                    'templateResult' => new JsExpression('function(city) { return city.text; }'),
                                    'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                                    'allowClear' => true,
                                ],
                                ]);
                            
?>
                        </h2>
                        <h5 class="widget-user-desc"><i class="fa fa-envelope"></i>Email <?= $form->field($model, 'customer_branch_name')->textInput(['maxlength' => true])->label(false) ?> </h5>
                        <h5 class="widget-user-desc"><i class="fa ion ion-location"></i>Address <?= $form->field($model, 'customer_branch_address')->textInput(['maxlength' => true])->label(false) ?></h5>
                        <h5 class="widget-user-desc"> <i class="fa ion ion-briefcase"></i>
                            <!--?php $customerQuery = Yii::$app->db->createCommand("SELECT description FROM customer WHERE id_customer = $model->id_customer_customer"  );
                            $customer = $customerQuery->queryScalar();
                            echo $customer;?-->
                        </h5>
                                                
                    </div>
                </div>
                
                </div>
                <div class="box-footer">

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
            </div>
        </div>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$js = <<< JS
$('#customerbranch-id_customer').on('change',function(){
    alert($('#customerbranch-id_customer').val());
    var id_customer = $(this).val();
    $.get('customer-info', {id_customer : id_customer}, function(data){
        var data = $.parseJSON(data);
        alert(data.customer_email);
        $('#email').html(data.customer_email);
        $('#phone').html(data.customer_phone);
    })
})
JS;
// Call the above js script in your view
$this->registerJs($js);

?>