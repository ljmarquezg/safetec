<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\icons\Icon;
use backend\models\AttendanceSearch;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <div id="message">

    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--?= Html::a('Create Department', ['create'], ['class' => 'btn btn-success']) ?-->
    </p>
    <?php 
    Modal::begin([
        'headerOptions'=>['class'=> 'bg-yellow'],
        'header'=>'<h3> <i class="ion ion-brief"></i> Create Department </h3>',
        'id'=> 'modalAddDepartment',
        'size'=>'modal-md',
        'class'=>'firstmodal',
        'options'=>['data-backdrop'=>'static',
        'data-keyboard'=>"false",
        'data-dismiss'=>"",]
        ]);
    echo '<div id="modalContentAddDepartment"></div>';

    Modal::end();
    ?>  
    
    <?php Pjax::begin(['id'=>'departmentGrid'])?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'resizableColumns'=>true,
        'pjax'=>true,   
        'showPageSummary' => true,
        'hover'=> true,    
        'panel' => [
        'headerOption'=>['class'=>'bg-aqua'],
        'heading'=>'<h3 class="panel-title"><i class="fa ion ion-person"> </i> '. Html::encode($this->title) .'</h3>',
        'type'=>'success',
        'before'=>Html::button('Create Department', ['value'=> Url::to('./createmodal'),
            'id'=>'AddDepartment', 'class' => 'btn btn-success modalButton']) ,
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        
        ],

        'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        'id_department',
        'description',
        ['class' => 'kartik\grid\ActionColumn',
            'visibleButtons' => [
                'view' => function ($model, $key, $index) {
                    return Yii::$app->user->can('view-department') === 1 ? false : true;
                 },
                 'edit' => function ($model, $key, $index) {
                    return Yii::$app->user->can('update-department') === 1 ? false : true;
                 },
                 'delete' => function ($model, $key, $index) {
                    return Yii::$app->user->can('view-department') === 1 ? false : true;
                 }

                ]
            ]
        ]

        ]); ?>

        <?php Pjax::end()?>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Form" data-backdrop="static" data-keyboard="false">Open Form Modal</button>


</div>


<script type="text/javascript">
    $(document).ready(function () {
    $('.closefirstmodal').click(function () {
        $('#Warning').modal('show');
    });

    $('.confirmclosed').click(function () {
        $('#Warning').modal('hide');
        $('#Form').modal('hide');
    });
});
</script>