<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */

$this->title = 'Create Customer Branch';
$this->params['breadcrumbs'][] = ['label' => 'Customer Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-branch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
