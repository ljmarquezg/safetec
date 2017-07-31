<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
//use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use bupy7\cropbox\Cropbox;
use yii\imagine\Image;
use yii\web\JsExpression;
use backend\models\customer\customer;
/* @var $this yii\web\View */
/* @var $model backend\models\customer\customer */
/* @var $form yii\widgets\ActiveForm */
  $customer_image =  Yii::$app->params['customer_image'];
    if(!is_null($model->id_customer)){
        $imageQuery = Yii::$app->db->createCommand("SELECT image FROM customer WHERE id_customer = $model->id_customer"  );
        $imagePath = $imageQuery->queryScalar();
        echo $imagePath;
        if(is_null($imagePath) or $imagePath ==''){
            $imagePath = $customer_image;
        }else{
            $imagePath = $imagePath;
        }
    }else{
        $imagePath = $customer_image;
    }
?>
<div class="customer-form">
    <div id="message">
    </div>

    <?php $form = ActiveForm::begin(['id'=>$model->formName(),'options' => ['enctype'=>'multipart/form-data'],]); ?>
    <div class="col-xs-12 col-xs-no-padding">
        <div class="customer-form">
            <div class="col-md-12 col-xs-no-padding">
                <h1 class="widget-user-title bg-green"><?= $this->title ?></h1>
                <div class="box box-widget widget-user view ">
                    <div class="widget-user-header bg-green-active">
                        <div class="widget-user-image">
                            <!-- Modal -->
                            <img class="img-circle" src="<?php if (is_Null($model->image) or $model->image == '' ){
                                echo $customer_image;
                            }else{
                                echo $model->image;
                            } ?>" alt="User Avatar">
                            <button type="button" class="btn btn-default btn-block btn-file" id="deleteImage"><i class="glyphicon glyphicon-trash"></i></button>
                            <button type="button" class="btn btn-default y btn-block btn-file modalButton" id="UserImage" data-toggle="modal" data-target="#userImage"><i class="glyphicon glyphicon-camera"></i></button>


                            <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                                <!--label class="control-label">Status</label-->
                                <?= $form->field($model, 'customer_status')->checkbox(array('id'=>'customer-'.$model->id_customer,
                                'class'=>'onoffswitch-checkbox','label' => '','data-status'=>$model->id_customer,'value'=>$model->id_customer,))?>
                                <!--script type="text/javascript">
                                    var $ = jQuery.noConflict();
                                    $(window).ready(function(){$(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')})</script-->

                                </div>
                            </div>
                            <!--Left - Container-->
                            <!--Right Container-->
                            <div class="widget-header-input">
                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true, 'class'=>'text-left'])?>
                                    </h3>
                                </div>

                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <h5 class="description-header"> <?= $form->field($model, 'customer_email')->input('email',['maxlength' => true,'class'=>'text-left']) ?></h5>
                                    </h3>
                                </div>

                                <div class="widget-user-username">
                                    <h3 class="description-block text-left">
                                        <h5 class="description-header"> <h5 class="description-header"><?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true,'class'=> 'text-left']) ?></h5></h5>
                                    </h3>
                                </div>

                            </div>

                        </div>
                        <div class="box-footer">
                        <div class="row">
                            <!--div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">                          

                                    <h5 class="description-header"> 
                                        <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">                          

                                    <h5 class="description-header"> 
                                        <?= $form->field($model, 'customer_email')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div>


                            <div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">                          

                                    <h5 class="description-header"> <?= $form->field($model, 'customer_fax')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div-->

                            <div class="col-md-3 col-sm-12">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        <?= $form->field($model, 'customer_country')->textInput(['maxlength' => true]) ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="description-block">
                                    <?= $form->field($model, 'customer_state')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                                <div class="description-block">
                                    <?= $form->field($model, 'customer_zip')->textInput(['maxlength' => true]) ?>

                                </div>
                            </div>

                            <div class="col-md-3 col-xs-12 ">
                                <div class="description-block">
                                    <?= $form->field($model, 'customer_zone')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                                <div class="col-xs-12">
                                    <div class="form-group pull-right">
                                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    
    <div id="userImage" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
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
            $('.customer-form .img-circle').attr('src', croppedImage );    
        }

        $('#deleteImage').on('click',function(){
            $('.customer-form .img-circle').attr('src','{$customer_image}');
        })
JS;
$this->registerJs($cropImage);
?>
