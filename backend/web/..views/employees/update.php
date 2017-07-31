<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\employees\Employees */

$this->title = 'Update Employees: ' . $model->id_employees;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_employees, 'url' => ['view', 'id' => $model->id_employees]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employees-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
