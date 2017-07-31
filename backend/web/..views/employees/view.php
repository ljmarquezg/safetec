<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\employees\Employees */

$this->title = $model->id_employees;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_employees',
            'employee_name',
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

</div>
