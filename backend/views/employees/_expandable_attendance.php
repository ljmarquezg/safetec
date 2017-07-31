<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\icons\Icon;
use backend\models\AttendanceSearch;
use backend\models\EmployeesSearch;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $model backend\models\Employees */

$this->title = $model->Employees_Name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.widget-user-header > .widget-user-image {
    display: inline-block;
}
.widget-user-2 .widget-user-image > img {
    float: none;
}
.widget-user-header>.widget-user-image{
    display: inline-block;
}
.widget-user-2 .widget-user-username, .widget-user-2 .widget-user-desc {
    margin-left: 15px;
    display: inline-block;
}
</style>
<?php
$searchModelAttendance = new AttendanceSearch();
$dataProviderAttendance = $searchModelAttendance->search(Yii::$app->request->queryParams);
$dataProviderAttendance->query->where('employees.id_employees ='. $model->id_employees.'');
$dataProviderAttendance->pagination  = false;

$dataProviderAttendanceVacations = $searchModelAttendance->search(Yii::$app->request->queryParams);
$dataProviderAttendanceVacations->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 1');

$dataProviderAttendanceSick = $searchModelAttendance->search(Yii::$app->request->queryParams);
$dataProviderAttendanceSick->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 2')->orWhere('Attendandce_Type_ID = 3');

$dataProviderAttendanceCasual = $searchModelAttendance->search(Yii::$app->request->queryParams);
$dataProviderAttendanceCasual->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 4')->orWhere('Attendandce_Type_ID = 5');

$dataProviderAttendanceNoContact = $searchModelAttendance->search(Yii::$app->request->queryParams);
$dataProviderAttendanceNoContact->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 6');

$dataProviderAttendanceLate = $searchModelAttendance->search(Yii::$app->request->queryParams);
$dataProviderAttendanceLate->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 7');

$dataProviderAttendanceOther = $searchModelAttendance->search(Yii::$app->request->queryParams);
$dataProviderAttendanceOther->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 8');

$dataProviderAttendanceBereavement = $searchModelAttendance->search(Yii::$app->request->queryParams);
$dataProviderAttendanceBereavement->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 9');
?>
<div class="employees-view">
    <?php $Vacations = Yii::$app->db->createCommand("SELECT sum(Vacation) FROM attendance WHERE  'id_employees' =  $model->id_employees");
    $SumVacations = $Vacations->queryScalar();
    echo $SumVacations;?>

    <div class="col-md-6 col-xs-no-padding">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user view">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
                <div class="widget-user-image">
                    <img class="img-circle" src="../dist/img/attendance-128x128.jpg" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Attendance Summary</h3>
                <div style="display: inline-grid;">
                    <h5 class="widget-user-desc"><p><span class="badge">A</span>Avalilable</p> <p><span class="badge bg-red">U</span> Used</p><p><span class="badge bg-green">R</span>Remaining</p></h5>
                </div>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                <li>
                        <a href="#"><b>Description</b>
                            <span class="pull-right badge bg-green">
                                R
                            </span>
                            <span class="pull-right badge bg-red">
                                U
                            </span>
                            <span class="pull-right badge">
                                A
                            </span> 
                        </a>
                    </li>

                    <li>
                        <a href="#">Vacations Days
                            <?php $commandVacations = Yii::$app->db->createCommand("SELECT sum(Vacation) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumVacations = $commandVacations->queryScalar();
                                $availableVacations = ($model->Employees_Vacation + $sumVacations);
                            ?>
                            <span class="pull-right badge <?php
                                 switch (true) {
                                    case ($availableVacations > 0) :echo 'bg-green';
                                        break;
                                    case  ($availableVacations == 0) : echo "bg-default";
                                        break;
                                    case ($availableVacations > 0) :echo "bg-red";
                                        break;
                                    }?>">
                                <?= $availableVacations; ?>
                            </span>
                            <span class="pull-right badge bg-red">
                                <?php $commandVacations = Yii::$app->db->createCommand("SELECT sum(Vacation) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumVacations = $commandVacations->queryScalar(); echo $sumVacations;?>
                            </span>
                            <span class="pull-right badge default">
                                <?php echo $model->Employees_Vacation ?>
                            </span> 
                        </a>
                    </li>
                    <li>
                        <a href="#">Sickleave
                            <?php $commandSick = Yii::$app->db->createCommand("SELECT sum(Sickleave) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumSick = $commandSick->queryScalar();
                                $availableSick = ($model->Employees_Sick + $sumSick);
                            ?>
                            <span class="pull-right badge <?php
                                 switch (true) {
                                    case ($availableSick > 0) :echo 'bg-green';
                                        break;
                                    case  ($availableSick == 0) : echo "bg-default";
                                        break;
                                    case ($availableSick > 0) :echo "bg-red";
                                        break;
                                    }?>">
                                <?= $availableSick; ?>
                            </span>
                            <span class="pull-right badge bg-red">
                                <?php $commandSick = Yii::$app->db->createCommand("SELECT sum(Sickleave) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumSick = $commandSick->queryScalar(); echo $sumSick;?>
                            </span>
                            <span class="pull-right badge default">
                                <?php echo $model->Employees_Sick ?>
                            </span> 
                        </a>
                    </li>

                    <li>
                        <a href="#">Casual
                            <?php $commandCasual = Yii::$app->db->createCommand("SELECT sum(Casual) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumCasual = $commandCasual->queryScalar();
                                $availableCasual = ($model->Employees_Casual + $sumCasual);
                            ?>
                            <span class="pull-right badge <?php
                                 switch (true) {
                                    case ($availableCasual > 0) :echo 'bg-green';
                                        break;
                                    case  ($availableCasual == 0) : echo "bg-default";
                                        break;
                                    case ($availableCasual > 0) :echo "bg-red";
                                        break;
                                    }?>">
                                <?= $availableCasual; ?>
                            </span>
                            <span class="pull-right badge bg-red">
                                <?php $commandCasual = Yii::$app->db->createCommand("SELECT sum(Casual) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumCasual = $commandCasual->queryScalar(); echo $sumCasual;?>
                            </span>
                            <span class="pull-right badge default">
                                <?php echo $model->Employees_Casual ?>
                            </span> 
                        </a>
                    </li>

                    <li>
                        <a href="#">Bereavement
                            <?php $commandBereavement = Yii::$app->db->createCommand("SELECT sum(Bereavement) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumBereavement = $commandBereavement->queryScalar();
                            $availableBereavement = ($model->Employees_Bereavement + $sumBereavement);
                            ?>
                            <span class="pull-right badge <?php
                                 switch (true) {
                                    case ($availableBereavement > 0) :echo 'bg-green';
                                        break;
                                    case  ($availableBereavement == 0) : echo "bg-default";
                                        break;
                                    case ($availableBereavement > 0) :echo "bg-red";
                                        break;
                                    }?>">
                                <?= $availableBereavement; ?>
                            </span>
                            <span class="pull-right badge bg-red">
                                <?php $commandBereavement = Yii::$app->db->createCommand("SELECT sum(Bereavement) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumBereavement = $commandBereavement->queryScalar(); echo $sumBereavement;?>
                            </span>
                            <span class="pull-right badge default">
                                <?php echo $model->Employees_Bereavement ?>
                            </span> 
                        </a>
                    </li>

                    <li>

                        <a href="#">Late
                        <span class="pull-right badge">
                            0
                        </span>
                            <span class="pull-right badge bg-red">
                                <?php $commandLate = Yii::$app->db->createCommand("SELECT sum(Late) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumLate = $commandLate->queryScalar();
                                echo $sumLate;
                                ?>
                            </a>
                        </a>
                    </li>

                    <li>
                        <a href="#">No Contact
                        <span class="pull-right badge">
                            0
                        </span>
                            <span class="pull-right badge bg-red">
                                <?php $commandNoContact = Yii::$app->db->createCommand("SELECT sum(NoContact) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumNoContact = $commandNoContact->queryScalar(); echo $sumNoContact;?>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#">Other
                        <span class="pull-right badge">
                            0
                        </span>
                            <span class="pull-right badge bg-red">
                                <?php $commandOther = Yii::$app->db->createCommand("SELECT sum(Other) FROM attendance WHERE id_employees = $model->id_employees"  ); $sumOther = $commandOther->queryScalar(); echo $sumOther;?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </ul>
</div>
</div>
<!-- /.widget-user -->
</div>




<!--h3><?= Html::encode($this->title) ?></h3>

<p>
<?= Html::a('Update', ['update', 'id' => $model->id_employees], ['class' => 'btn btn-primary']) ?>
<?= Html::a('Delete', ['delete', 'id' => $model->id_employees], [
'class' => 'btn btn-danger',
'data' => [
'confirm' => 'Are you sure you want to delete this item?',
'method' => 'post',
],
]) ?>
</p-->

<div class="col-xs-12 col-xs-no-padding" >

    <div class="col-md-12 col-xs-no-padding">
        <div class="box box-aqua collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Information</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <h3>Attendance Report</h3>
                <?php 
                $gridColumns =[
                ['class' => 'kartik\grid\SerialColumn'],
//'Attendance_ID',
//'id_employees',
                'Attendance_StartDate',
                'Attendance_EndDate',
//'Attendance_Type',
                [
                'attribute'=> 'Attendance_Type',
                'value' => 'attendanceType.Attendance_Description',

                ],

                'TotalDays',
                [
                'attribute'=> 'Vacation',
                'pageSummary' => True,

                ],
                [
                'attribute'=> 'SickLeave',
                'pageSummary' => True,

                ],
                [
                'attribute'=> 'Casual',
                'pageSummary' => True,

                ],
                [
                'attribute'=> 'Bereavement',
                'pageSummary' => True,

                ],
                [
                'attribute'=> 'NoContact',
                'pageSummary' => True,

                ],
                [
                'attribute'=> 'Late',
                'pageSummary' => True,

                ],
                [
                'attribute'=> 'Other',
                'pageSummary' => True,

                ],

                'Remarks',
// 'Created',

//['class' => 'yii\grid\ActionColumn'],
                ];

                echo GridView::widget([
                    'dataProvider' => $dataProviderAttendance,
                    'filterModel' => $searchModelAttendance,
                    'columns' => $gridColumns,
                    'showPageSummary' => true,
                    'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
                    ],
// the toolbar setting is default
                    'toolbar' => [
                    '{export}',
                    ['content'=>

                    /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                    ],
                    ],
// configure your GRID inbuilt export dropdown to include additional items
                    ]);
                    ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-12">
            <div class="box box-aqua collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Vacations</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h3> Vacations Report</h3>
                    <?php 
                    $gridColumns =[
                    ['class' => 'kartik\grid\SerialColumn'],
//'Attendance_ID',
//'id_employees',
                    'Attendance_StartDate',
                    'Attendance_EndDate',
//'Attendance_Type',
                    [
                    'attribute'=> 'Attendance_Type',
                    'value' => 'attendanceType.Attendance_Description',

                    ],

                    'TotalDays',
                    [
                    'attribute'=> 'Vacation',
                    'pageSummary' => True,

                    ],

                    'Remarks',
// 'Created',

                    ['class' => 'kartik\grid\ActionColumn'],
                    ];

                    echo GridView::widget([
                        'dataProvider' => $dataProviderAttendanceVacations,
                        'filterModel' => $searchModelAttendance,
                        'columns' => $gridColumns,
                        'showPageSummary' => true,
                        'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
                        ],
// the toolbar setting is default
                        'toolbar' => [
                        '{export}',
                        ['content'=>

                        /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                        ],
                        ],
// configure your GRID inbuilt export dropdown to include additional items
                        ]);
                        ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-12">
                <div class="box box-aqua collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sick</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3> Sick Attendance </h3>
                        <?php 
                        $gridColumns =[
                        ['class' => 'kartik\grid\SerialColumn'],
//'Attendance_ID',
//'id_employees',
                        'Attendance_StartDate',
                        'Attendance_EndDate',
//'Attendance_Type',
                        [
                        'attribute'=> 'Attendance_Type',
                        'value' => 'attendanceType.Attendance_Description',

                        ],

                        'TotalDays',

                        [
                        'attribute'=> 'SickLeave',
                        'pageSummary' => True,

                        ],

                        'Remarks',
// 'Created',

                        ['class' => 'kartik\grid\ActionColumn'],
                        ];

                        echo GridView::widget([
                            'dataProvider' => $dataProviderAttendanceSick,
                            'filterModel' => $searchModelAttendance,
                            'columns' => $gridColumns,
                            'showPageSummary' => true,
                            'panel' => [
                            'type' => GridView::TYPE_PRIMARY,
                            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
                            ],
// the toolbar setting is default
                            'toolbar' => [
                            '{export}',
                            ['content'=>

                            /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                            ],
                            ],
// configure your GRID inbuilt export dropdown to include additional items
                            ]);
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-12">
                    <div class="box box-aqua collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Casual</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h3> Sick Attendance </h3>
                            <h3> Casual Attendance </h3>
                            <?php 
                            $gridColumns =[
                            ['class' => 'kartik\grid\SerialColumn'],
//'Attendance_ID',
//'id_employees',
                            'Attendance_StartDate',
                            'Attendance_EndDate',
//'Attendance_Type',
                            [
                            'attribute'=> 'Attendance_Type',
                            'value' => 'attendanceType.Attendance_Description',

                            ],

                            'TotalDays',

                            [
                            'attribute'=> 'Casual',
                            'pageSummary' => True,

                            ],

                            'Remarks',
// 'Created',

                            ['class' => 'kartik\grid\ActionColumn'],
                            ];

                            echo GridView::widget([
                                'dataProvider' => $dataProviderAttendanceCasual,
                                'filterModel' => $searchModelAttendance,
                                'columns' => $gridColumns,
                                'showPageSummary' => true,
                                'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
                                ],
// the toolbar setting is default
                                'toolbar' => [
                                '{export}',
                                ['content'=>

                                /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                                ],
                                ],
// configure your GRID inbuilt export dropdown to include additional items
                                ]);
                                ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>


                    <div class="col-md-12">
                        <div class="box box-aqua collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Bereavement</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h3> Bereavement Attendance </h3>
                                <?php 
                                $gridColumns =[
                                ['class' => 'kartik\grid\SerialColumn'],
//'Attendance_ID',
//'id_employees',
                                'Attendance_StartDate',
                                'Attendance_EndDate',
//'Attendance_Type',
                                [
                                'attribute'=> 'Attendance_Type',
                                'value' => 'attendanceType.Attendance_Description',

                                ],

                                'TotalDays',

                                [
                                'attribute'=> 'Bereavement',
                                'pageSummary' => True,

                                ],

                                'Remarks',
// 'Created',

                                ['class' => 'kartik\grid\ActionColumn'],
                                ];

                                echo GridView::widget([
                                    'dataProvider' => $dataProviderAttendanceBereavement,
                                    'filterModel' => $searchModelAttendance,
                                    'columns' => $gridColumns,
                                    'showPageSummary' => true,
                                    'panel' => [
                                    'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
                                    ],
// the toolbar setting is default
                                    'toolbar' => [
                                    '{export}',
                                    ['content'=>

                                    /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                                    ],
                                    ],
// configure your GRID inbuilt export dropdown to include additional items
                                    ]);
                                    ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>

                        <div class="col-md-12">
                            <div class="box box-aqua collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">No Contact</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <h3> No Contact Attendance </h3>
                                    <?php 
                                    $gridColumns =[
                                    ['class' => 'kartik\grid\SerialColumn'],
//'Attendance_ID',
//'id_employees',
                                    'Attendance_StartDate',
                                    'Attendance_EndDate',
//'Attendance_Type',
                                    [
                                    'attribute'=> 'Attendance_Type',
                                    'value' => 'attendanceType.Attendance_Description',

                                    ],

                                    'TotalDays',

                                    [
                                    'attribute'=> 'NoContact',
                                    'pageSummary' => True,

                                    ],

                                    'Remarks',
// 'Created',

                                    ['class' => 'kartik\grid\ActionColumn'],
                                    ];

                                    echo GridView::widget([
                                        'dataProvider' => $dataProviderAttendanceNoContact,
                                        'filterModel' => $searchModelAttendance,
                                        'columns' => $gridColumns,
                                        'showPageSummary' => true,
                                        'panel' => [
                                        'type' => GridView::TYPE_PRIMARY,
                                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
                                        ],
// the toolbar setting is default
                                        'toolbar' => [
                                        '{export}',
                                        ['content'=>

                                        /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                                        ],
                                        ],
// configure your GRID inbuilt export dropdown to include additional items
                                        ]);
                                        ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>


                            <!-- Nav tabs --><div class="card">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Information" aria-controls="Information" role="tab" data-toggle="tab"></a></li>
                                <li role="presentation"><a href="#vacation" aria-controls="vacation" role="tab" data-toggle="tab"></a></li>
                                <li role="presentation"><a href="#sick" aria-controls="sick" role="tab" data-toggle="tab"></a></li>
                                <li role="presentation"><a href="#casual" aria-controls="casual" role="tab" data-toggle="tab"></a></li>
                                <li role="presentation"><a href="#bereavement" aria-controls="bereavement" role="tab" data-toggle="tab"></a></li>
                                <li role="presentation"><a href="#nocontact" aria-controls="nocontact" role="tab" data-toggle="tab"></a></li>
                                <li role="presentation"><a href="#late" aria-controls="late" role="tab" data-toggle="tab">Late</a></li>
                                <li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab">Other</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane" id="vacation">


                                </div>
                                <div role="tabpanel" class="tab-pane" id="sick">

                                </div>
                                <div role="tabpanel" class="tab-pane" id="casual">

                                </div>
                                <div role="tabpanel" class="tab-pane" id="bereavement">

                                </div>
                                <div role="tabpanel" class="tab-pane" id="nocontact">

                                </div>
                                <div role="tabpanel" class="tab-pane" id="late">
                                    <h3> Late Attendance </h3>
                                    <?php 
                                    $gridColumns =[
                                    ['class' => 'kartik\grid\SerialColumn'],
//'Attendance_ID',
//'id_employees',
                                    'Attendance_StartDate',
                                    'Attendance_EndDate',
//'Attendance_Type',
                                    [
                                    'attribute'=> 'Attendance_Type',
                                    'value' => 'attendanceType.Attendance_Description',

                                    ],

                                    'TotalDays',

                                    [
                                    'attribute'=> 'Late',
                                    'pageSummary' => True,

                                    ],

                                    'Remarks',
// 'Created',

                                    ['class' => 'kartik\grid\ActionColumn'],
                                    ];

                                    echo GridView::widget([
                                        'dataProvider' => $dataProviderAttendanceLate,
                                        'filterModel' => $searchModelAttendance,
                                        'columns' => $gridColumns,
                                        'showPageSummary' => true,
                                        'panel' => [
                                        'type' => GridView::TYPE_PRIMARY,
                                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
                                        ],
// the toolbar setting is default
                                        'toolbar' => [
                                        '{export}',
                                        ['content'=>

                                        /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                                        ],
                                        ],
// configure your GRID inbuilt export dropdown to include additional items
                                        ]);
                                        ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="other">
                                        <h3>Other Attendance </h3>
                                        <?php 
                                        $gridColumns =[
                                        ['class' => 'kartik\grid\SerialColumn'],
//'Attendance_ID',
//'id_employees',
                                        'Attendance_StartDate',
                                        'Attendance_EndDate',
//'Attendance_Type',
                                        [
                                        'attribute'=> 'Attendance_Type',
                                        'value' => 'attendanceType.Attendance_Description',

                                        ],

                                        'TotalDays',

                                        [
                                        'attribute'=> 'Other',
                                        'pageSummary' => True,

                                        ],

                                        'Remarks',
// 'Created',

                                        ['class' => 'kartik\grid\ActionColumn'],
                                        ];

                                        echo GridView::widget([
                                            'dataProvider' => $dataProviderAttendanceOther,
                                            'filterModel' => $searchModelAttendance,
                                            'columns' => $gridColumns,
                                            'showPageSummary' => true,
                                            'panel' => [
                                            'type' => GridView::TYPE_PRIMARY,
                                            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
                                            ],
// the toolbar setting is default
                                            'toolbar' => [
                                            '{export}',
                                            ['content'=>

                                            /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                                            ],
                                            ],
// configure your GRID inbuilt export dropdown to include additional items
                                            ]);
                                            ?></div>

                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
