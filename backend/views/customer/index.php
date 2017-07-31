<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\icons\Icon;
use backend\models\customer\CustomerBranchSearch;
use backend\models\Status;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\customer\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$createButtonCustomer = Html::a('Create Customer', ['/customer/create'], ['class' => 'btn btn-success']);
$createButtonBranch = Html::a('Create Branch', ['/customer-branch/create'], ['class' => 'btn btn-success']);
?>
<?php
$gridColumns = [
        ['class' => 'kartik\grid\SerialColumn'],
        ['class'=>'kartik\grid\ExpandRowColumn',
         'value'=> function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model,$key, $index, $column){
                    $searchModel = new CustomerBranchSearch();
                    $searchModel->id_customer = $model->id_customer;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    $dataProvider->pagination  = false;
                    return Yii::$app->controller->renderPartial('_customerbranch', [
                        'searchModel'=>$searchModel,
                        'dataProvider'=>$dataProvider,
                        ]);
                }
        ],

       [
        'attribute' => 'id_customer_status',
        'filterType'=>GridView::FILTER_SELECT2,
        'format' => 'raw',
        'options'=>['class'=>'select2-bootstrap', 'style'=>'max-width:150px; width:120px;', 'allowClear' => true],
        'value' => function ($model) {
            if ($model->id_customer_status == 1) {
                    return '<p class="label label-primary">Active</p>'; // "x" icon in red color
                }
                if ($model->id_customer_status == 2) {
                    return '<p class="label label-danger">Inactive</p>'; // "x" icon in red color
                }
            },
                'filter'=>array( ""=>"Show all", "1"=>"Active","2"=>"Inactive"),
            ],
        [
        'attribute' => 'image',
        'format' => 'raw',
        'options'=>['class'=>'views_thumbs', 'style'=>'width:30px;height: 30px;', 'allowClear' => true],
        'value' => function ($model) {
            if ($model->image !== '') {
                    return '<img src="'.$model->image.'" class="views_thumbs">'; // "x" icon in red color
                }
            if (!isset($model->image)  or $model->image == ''){
                    return '<img src="'.Yii::$app->params['customer_image'].'" class="views_thumbs">'; // "x" icon in red color
                }
            },
            ],
                'customer_name',
                'customer_address',
                //'Employees_Phone',
                //'Employees_Email',
                //'Employees_Vacation',
                //'Employees_Sick',
                //'Employees_Casual',
                //'Employees_Bereavement',
                //'Employees_StartDate:Date',
        /*[
                //'attribute'=> 'Employees_Department',
                //'value' => 'employeesDepartment.Description',

        ],*/

            /*[
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'Employees_Sick',
            'pageSummary' => true
            ],*/

            [
            'class' => 'kartik\grid\ActionColumn',
            'header'=>'',
            'dropdown' => true,
            'vAlign'=>'middle',
            //'urlCreator' => function($action, $model, $key, $index) { return '#'; },
            'viewOptions'=>['title'=>'', 'data-toggle'=>'tooltip'],
            'updateOptions'=>['title'=>'', 'data-toggle'=>'tooltip'],
            'deleteOptions'=>['title'=>'', 'data-toggle'=>'tooltip'], 
            /*'visibleButtons' => [
            'view' => function ($model, $key, $index) {
                return Yii::$app->user->can('employees-view') == 1 ? true : false;
            },
            'update' => function ($model, $key, $index) {
                return Yii::$app->user->can('employees-update') == 1 ? true : false;
            },
            'delete' => function ($model, $key, $index) {
                return Yii::$app->user->can('employees-delete') == 1 ? true : false;
            }
                ]*/
            ],

        ];

        ?>

<?php
$gridExportColumns = [
                'customer_name',
                'customer_address',
];

echo ExportMenu::widget([
        'dataProvider'=>$dataProvider,
        'columns'=> $gridExportColumns,
        'target'=>ExportMenu::TARGET_POPUP,
    ])

?>
<div class="customer-index col-xs-12 col-xs-no-padding">
<div class="">
</div>
    <!--h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'hover' => true,
        'condensed' => true,
        'rowOptions'=>function($model){
            if ($model->customer_status == 2){
                return ['class'=> 'gray'];
            }
        },
        'resizableColumns'=>true,
        'responsive' => false,
        'pjax'=>true,   
        //'showPageSummary' => true,
        'hover'=> true,    
        'panel' => [
        //'headerOptions'=>['class'=>'bg-aqua'],
        'heading'=>'<h3 class="panel-title"><i class="fa ion ion-person"> </i> '. Html::encode($this->title) .'</h3>',
        //'type'=>'bg-green',
        'before'=>$createButtonCustomer. ' ' . $createButtonBranch,
        //'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        ],
        'toolbar' => ['{toggleData}']

            ]); 
            ?>


</div>
