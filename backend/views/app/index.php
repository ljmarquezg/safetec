<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\app\AppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create App', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_app',
            'company_image',
            'user_image',
            'customer_image',
            'customer_branch_image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
