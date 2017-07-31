<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */

$this->title = $model->id_customer_branch;
$this->params['breadcrumbs'][] = ['label' => 'Customer Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-branch-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_customer_branch], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_customer_branch], [
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
            'id_customer_branch',
            'id_customer',
            'division_name',
            'division_address',
            'division_address2',
            'division_created',
            'id_customer_status',
        ],
    ]) ?>

</div>
