<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use \kartik\form\ActiveForm;    
use yii\helpers\Url;
use kartik\icons\Icon;
use backend\models\customer\CustomerSearch;
use backend\models\customer\Customer;
$customer_image =  Yii::$app->params['customer_image'];

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */

$this->title = $model->customer_branch_name;
$this->params['breadcrumbs'][] = ['label' => 'Customer Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-branch-view">

    <!--h1><?= Html::encode($this->title) ?></h1-->

   
    <div class="col-xs-12" style="background-color:white">
        <?php $data = ArrayHelper::map(Customer::find()->all(), 'id_customer', 'customer_name')?>

        <div class="customer_branch-form">
            <div class="col-md-12">
             <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_customer_branch], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_customer_branch], ['class' => 'btn btn-danger','data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post',],]) ?>
    </p>
                <!-- Widget: user widget style 1 -->
                 <h1 class="widget-user-title bg-green">Customer Branch # <?= $model->id_customer_branch ?></h1>
                <div class="box box-widget widget-user view">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-green-active">
                        <div class="widget-user-image">

                         <?php $imagePath = $model->image;
                                if(is_null($imagePath) or $imagePath ==''){
                                   $imagePath = $customer_image;
                                }else{
                                    $imagePath = $imagePath;
                                };?>
                            
                            <img class="img-circle" src="<?php echo $imagePath;?>" alt="User Avatar">
                        </div>
                        <div style="display: inline-grid;">
                         <?php $customerQuery = Yii::$app->db->createCommand("SELECT customer_name FROM customer WHERE id_customer = $model->id_customer"  );
                                $customerName = $customerQuery->queryScalar();?>
                            <h2 class="widget-user-username"><i class="fa ion ion-home"></i><?= $customerName ?></h2>
                            <h2 class="widget-user-username"><i class="fa ion ion-merge"></i><?= $model->customer_branch_name ?></h2>
                            <h5 class="widget-user-desc"></h5>
                            <h5 class="widget-user-desc">
                                <?php $statusQuery = Yii::$app->db->createCommand("SELECT id_customer_branch_status FROM customer_branch WHERE id_customer_branch =    $model->id_customer_branch"  );
                                $status = $statusQuery->queryScalar();
                                if($status == 1){
                                    echo '<i class="fa fa-toggle-on"></i> Active';
                                }else{
                                    echo '<i class="fa fa-toggle-off"></i> Inactive';
                                }
                                /*echo $status;*/?>
                            </h5>
                            <h5 class="widget-user-desc"><i class="fa fa-envelope"></i> <?= $model->customer_branch_email?></h5>
                            <h5 class="widget-user-desc"><i class="fa ion ion-android-call"></i> <?= $model->customer_branch_phone ?></h5>
                            <h5 class="widget-user-desc"> <i class="fa ion ion-location"></i>
                                <?= $model->customer_branch_address ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <?php 
                        if(!isset($model->customer_branch_ID)){

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
