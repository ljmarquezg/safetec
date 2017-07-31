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

    <!--h1><?= Html::encode($this->title) ?></h1>

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

<div class="col-xs-12" >
                            <!-- Nav tabs --><div class="card">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Information" aria-controls="Information" role="tab" data-toggle="tab">Information</a></li>
                                <li role="presentation"><a href="#vacation" aria-controls="vacation" role="tab" data-toggle="tab">Vacations</a></li>
                                <li role="presentation"><a href="#sick" aria-controls="sick" role="tab" data-toggle="tab">Sick</a></li>
                                <li role="presentation"><a href="#casual" aria-controls="casual" role="tab" data-toggle="tab">Casual</a></li>
                                <li role="presentation"><a href="#bereavement" aria-controls="bereavement" role="tab" data-toggle="tab">Bereavement</a></li>
                                <li role="presentation"><a href="#nocontact" aria-controls="nocontact" role="tab" data-toggle="tab">No Contact</a></li>
                                <li role="presentation"><a href="#late" aria-controls="late" role="tab" data-toggle="tab">Late</a></li>
                                <li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab">Other</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="Information">
                                    <h1>Attendance Report</h1>
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
                                <div role="tabpanel" class="tab-pane" id="vacation">
                                    <h1> Vacations Report</h1>
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
                                <div role="tabpanel" class="tab-pane" id="sick">
                                <h1> Sick Attendance </h1>
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
                                <div role="tabpanel" class="tab-pane" id="casual">
                                    <h1> Casual Attendance </h1>
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
                                <div role="tabpanel" class="tab-pane" id="bereavement">
                                    <h1> Bereavement Attendance </h1>
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
                                <div role="tabpanel" class="tab-pane" id="nocontact">
                                <h1> No Contact Attendance </h1>
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
                                <div role="tabpanel" class="tab-pane" id="late">
                                <h1> Late Attendance </h1>
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
                                <h1>Other Attendance </h1>
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
