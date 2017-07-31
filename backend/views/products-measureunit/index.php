<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\products\ProductsMeasureunitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products Measureunits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-measureunit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products Measureunit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_product_measure_unit',
            'product_measure_unit_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
