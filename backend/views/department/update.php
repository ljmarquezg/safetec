<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Department */

$this->title = 'Update Department: ' . $model->id_department;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_department, 'url' => ['view', 'id' => $model->id_department]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelDepartment' => $modelDepartment,
    ]) ?>

</div>
