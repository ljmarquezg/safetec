<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\icons\Icon;
use backend\models\attendance\AttendanceSearch;
use backend\models\employees\EmployeesSearch;
use kartik\export\ExportMenu;
use backend\models\department\Department;
use \kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\employees\Employees */

$this->title = $model->id_employees;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-view">

    <!--h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_employees',
            'employees_name',
            'employees_phone',
            'employees_email:email',
            'employees_vacation',
            'employees_sick',
            'employees_casual',
            'employees_bereavement',
            'employees_startdate',
            'id_employees_department',
            'image',
            'employees_status',
            'employees_created',
        ],
    ]) ?>

</div-->


<div class="col-xs-12 col-xs-no-padding">
<p>
        <?= Html::a('Update', ['update', 'id' => $model->id_employees], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_employees], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $data = ArrayHelper::map(Department::find()->all(), 'id_department', 'description')?>

    <div class="employees-form">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user view">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <div class="widget-user-image">
                        <!--img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar"-->
                        <img class="img-circle" src="<?php if (is_Null($model->image) or $model->image == '' ){
                            echo '/images/elements/userprofile.png';
                            }else{
                                echo $model->image;
                                } ?>" alt="User Avatar">
                    </div>
                    <div style="display: inline-grid;">
                        <h2 class="widget-user-username"><?=$model->employees_name ?></h2>
                        <h5 class="widget-user-desc"><i class="fa ion ion-pound"></i> <?= $model->id_employees ?></h5>
                        <h5 class="widget-user-desc">
                         <?php $statusQuery = Yii::$app->db->createCommand("SELECT description FROM employees_status WHERE id_status =    $model->employees_status"  );
                            $status = $statusQuery->queryScalar();
                            if($status == 1){
                                echo '<i class="fa fa-toggle-on"></i> ';
                            }else{
                                echo '<i class="fa fa-toggle-off"></i> ';
                            }
                            echo $status;?>
                        </h5>
                        <h5 class="widget-user-desc"><i class="fa ion ion-android-calendar"></i> <?= $model->employees_startdate?></h5>
                        <h5 class="widget-user-desc"><i class="fa fa-envelope"></i> <?= $model->employees_email?></h5>
                        <h5 class="widget-user-desc"><i class="fa ion ion-android-call"></i> <?= $model->employees_phone ?></h5>
                        <h5 class="widget-user-desc"> <i class="fa ion ion-briefcase"></i>
                            <?php $departmentQuery = Yii::$app->db->createCommand("SELECT description FROM department WHERE id_department = $model->id_employees_department"  );
                            $department = $departmentQuery->queryScalar();
                            echo $department;?>
                        </h5>
                    </div>
                </div>
                
                </div>
                <div class="box-footer">
                    <div class="row">
                    <?php 
                            if(!isset($model->Employees_ID)){

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