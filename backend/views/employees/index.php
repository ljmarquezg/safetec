<?php


use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\icons\Icon;
use backend\models\AttendanceSearch;
use backend\models\Status;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmployeesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $this yii\web\View */
/* @var $searchModel backend\models\employees\EmployeesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employees', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


 <?php 
    
$createButton = Html::button('Create Employee', ['value'=> Url::to('forbiddenexception'),
            'id'=>'AddEmployee', 'class' => 'btn btn-success disabled']);

$createButton = Html::a('Create Employees', ['create'], ['class' => 'btn btn-success']);

$gridColumns = [
        ['class' => 'kartik\grid\SerialColumn'],
        [
        'attribute' => 'employees_status',
        'filterType'=>GridView::FILTER_SELECT2,
        'format' => 'raw',
        'options'=>['class'=>'select2-bootstrap', 'style'=>'max-width:150px; width:120px;', 'allowClear' => true],
        'value' => function ($model) {
            if ($model->employees_status == 1) {
                    return '<p class="label label-primary">Active</p>'; // "x" icon in red color
                }
                if ($model->employees_status == 2) {
                    return '<p class="label label-danger">Inactive</p>'; // "x" icon in red color
                }
            },
                'filter'=>array( ""=>"Show all", "1"=>"Active","2"=>"Inactive"),
            ],

        /*['class'=>'kartik\grid\ExpandRowColumn',
         'value'=> function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model,$key, $index, $column){
                    $searchModel = new AttendanceSearch();
                    $searchModel->Employees_ID = $model->employees_name;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    $dataProvider->pagination  = false;
                    return Yii::$app->controller->renderPartial('_attendance', [
                        'searchModel'=>$searchModel,
                        'dataProvider'=>$dataProvider,
                        ]);
                }
        ],*/
            //'Employees_ID',
                'employees_name',
                //'Employees_Vacation',
                //'Employees_Sick',
                //'Employees_Casual',
                //'Employees_Bereavement',
                'employees_startdate:Date',
        [
                'attribute'=> 'id_employees_department',
                'value' => 'employeesDepartment.description',

        ],
            ];

?>
    <!--?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_employees',
            'employees_name',
            'employees_phone',
            'employees_email:email',
            'employees_vacation',
            // 'employees_sick',
            // 'employees_casual',
            // 'employees_bereavement',
            // 'employees_startdate',
            // 'id_id_employees_department',
            // 'image',
            // 'employees_status',
            // 'employees_created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?-->


    <div class="employees-index col-xs-12 col-xs-no-padding">
    <div class="row">
        <!--h4><?= Html::encode($this->title) ?></h4-->
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <!--p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Create Employee', ['create'], ['class' => 'btn btn-success','id'=>'modalButton'])?>
    </p-->

    <?php 
    Modal::begin([
        'headerOptions'=>['class'=> 'bg-aqua icon', 'style'=>'height:120px;'],
        'header'=>'<h3 class="widget-user-username text-center">Create Employee</h3>',
        'id'=> 'modalAddEmployee',
        'size'=>'modal-lg',
        'options'=>['data-backdrop'=>'static',
        'data-keyboard'=>"false",]
        ]);
    echo '<div id="modalContentAddEmployee"></div>';

    Modal::end();
    ?>  
    <?php Pjax::begin(['id'=>'employeesGrid'])?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'hover' => true,
        'condensed' => true,
        'rowOptions'=>function($model){
            if ($model->employees_status == 2){
                //return ['class'=> 'danger'];
            }
        },
        'resizableColumns'=>true,
        'responsive' => false,
        'pjax'=>true,   
        'showPageSummary' => true,
        'hover'=> true,    
        'panel' => [
        'headerOption'=>['class'=>'bg-aqua'],
        'heading'=>'<h3 class="panel-title"><i class="fa ion ion-person"> </i> '. Html::encode($this->title) .'</h3>',
        'type'=>'success',
        'before'=>$createButton,
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),

        ],
            ]); 
            ?>
            <?php Pjax::end();?>
        </div>
    </div>
</div>
