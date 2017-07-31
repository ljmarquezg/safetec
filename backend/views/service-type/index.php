<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\services\ServicesTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Services Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_services',
            'services_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
