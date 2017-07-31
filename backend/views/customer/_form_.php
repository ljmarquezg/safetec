<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use bupy7\cropbox\Cropbox;
use yii\imagine\Image;
use yii\web\JsExpression;

use backend\models\customer\CustomerBranch


/* @var $this yii\web\View */
/* @var $model backend\models\customer\Customer */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="col-xs-12" style="background-color:white">
    <?php $form = ActiveForm::begin(['id'=>$model->formName(),'options' => ['enctype'=>'multipart/form-data'],]); ?>
<div class="customer-form">
        <div class="col-md-12">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                </div>
                <div class="widget-user-image">
<button type="button" class="btn btn-primary btn-block btn-file modalButton" id="UserImage" data-toggle="modal" data-target="#userImage"><i class="glyphicon glyphicon-camera"></i>   <span class="hidden-xs">Select Photo</span></button>

<!-- Modal -->
<div id="userImage" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <?php echo $form->field($model, 'file')->widget(Cropbox::className(), [
                        'attributeCropInfo' => 'crop_info',
                        /*'name' => 'customer[file]',*/
                    ]);?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
    </div>                  
                        <img class="img-circle" src="<?php if (is_Null($model->image) or $model->image == '' ){
                            echo '/images/elements/userprofile-gray.png';
                            }else{
                                echo $model->image;
                                } ?>" alt="User Avatar">

                </div>
                <div class="col-lg-12 col-xs-no-padding">
                    <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                        <!--label class="control-label">Status</label-->
                        <?= $form->field($model, 'id_customer_status')->checkbox(array(
                            'id'=>'customer-'.$model->id_customer,
                            'class'=>'onoffswitch-checkbox',
                            'label' => '',
                            'data-status'=>$model->id_customer,
                            'value'=>$model->id_customer,
                            )
                        )
                        ?>

                        <script type="text/javascript">
                                var $ = jQuery.noConflict();
                                $(window).ready(function(){$(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')})</script>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-lg-12 border-right">
                            <div class="description-block">                          

                                <h5 class="description-header"> <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
                                </h5>

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 border-right">
                            <div class="description-block">                          

                                <h5 class="description-header"> <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>
                                </h5>

                            </div>
                        </div>
                            

                            <div class="col-md-4 col-sm-12">
                            <div class="description-block">                          

                                <h5 class="description-header"> <?= $form->field($model, 'customer_fax')->textInput(['maxlength' => true]) ?>
                                </h5>

                            </div>
                        </div>
                        

                            <div class="col-md-4 col-xs-12">
                             <div class="description-block">
                                <?= $form->field($model, 'customer_email')->textInput(['maxlength' => true]) ?>
                             </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="description-block">
                                    <h5 class="description-header"> <?= $form->field($model, 'customer_address')->textInput(['maxlength' => true]) ?></h5>
                                </div>

                            </div>
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



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group pull-right">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>



<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

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
        $('.customer-form .img-circle').attr('src', croppedImage );
    }

</script>