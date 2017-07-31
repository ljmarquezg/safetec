<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\app\App */

$this->title = $model->id_app;
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_app], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_app], [
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
            'id_app',
            'company_image',
            'user_image',
            'customer_image',
            'customer_branch_image',
        ],
    ]) ?>

</div>
