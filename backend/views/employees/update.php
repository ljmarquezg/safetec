<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\employees\Employees */

$this->title = 'Update Employee: <br><p>' . $model->employees_name.'</p>';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employees_name, 'url' => ['view', 'id' => $model->id_employees]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employees-update">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
