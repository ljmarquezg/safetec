<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_employees',
            'employee_name',
            'employees_phone',
            'employees_email:email',
            'employees_vacation',
            // 'employees_sick',
            // 'employees_casual',
            // 'employees_bereavement',
            // 'employees_startdate',
            // 'id_employees_department',
            // 'image',
            // 'employees_status',
            // 'employees_created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
