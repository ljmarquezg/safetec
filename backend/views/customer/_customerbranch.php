<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use backend\models\customer\CustomerBranch;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AttendanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="attendance-index">
	<?php
	$gridColumns =[
	['class' => 'yii\grid\SerialColumn'],

	['attribute' => 'id_customer_branch_status',
	'filterType'=>GridView::FILTER_SELECT2,
	'format' => 'raw',
	'options'=>['class'=>'select2-bootstrap'],
	'value' => function ($model) {
		if ($model->id_customer_branch_status == 1) {
return '<p class="label label-primary">Active</p>'; // "x" icon in red color
}
if ($model->id_customer_branch_status == 2) {
return '<p class="label label-warning">'.Yii::t('app','Inactive').'</p>';; // "x" icon in red color
}
},
'filter'=>array("1"=>Yii::t('app', "Active"),"2"=>Yii::t('app',"Inactive")),
],
//'id_customer_branch',
//'id_customer',
[
        'attribute' => 'image',
        'format' => 'raw',
        'options'=>['class'=>'views_thumbs', 'style'=>'width:30px;height: 30px;', 'allowClear' => true],
        'value' => function ($model) {
            if ($model->image !== '') {
                    return '<img src="'.$model->image.'" class="views_thumbs">'; // "x" icon in red color
                }
            if (!isset($model->image)  or $model->image == ''){
                    return '<img src="'.Yii::$app->params['customer_branch_image'].'" class="views_thumbs">'; // "x" icon in red color
                }
            },
            ],
'customer_branch_name',
'customer_branch_email:email',
'customer_branch_phone',
'customer_branch_address',
// 'customer_branch_address2',
// 'customer_branch_created',


['class' => 'yii\grid\ActionColumn',
'template'=>'{view},{update}',
'buttons'=>[
'update' => function ($url, $model) {     
	return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::toRoute(['/customer-branch/update','id'=>$model->id_customer_branch]), [
		'title' => Yii::t('yii', 'Update'),
		]);                                

},

'view' => function ($url, $model) {     
	return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::toRoute(['/customer-branch/view','id'=>$model->id_customer_branch]), [
		'title' => Yii::t('yii', 'Update'),
		]);                                

},

/*'delete' => function ($url, $model) {     
	return Html::a('<span class="glyphicon glyphicon-plus"></span>', Url::toRoute(['./customer-branch/delete','id'=>$model->id_customer_branch]), [
		'title' => Yii::t('yii', 'delete'),
		]);  
}*/
]      
],

//['class' => 'yii\grid\ActionColumn'],
];


echo GridView::widget([
	'dataProvider' => $dataProvider,
	'columns' => $gridColumns,
//'showPageSummary' => true,



// the toolbar setting is default
	/*'toolbar' => [
	'{export}',
	['content'=>

	Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
	],
	],
// configure your GRID inbuilt export dropdown to include additional items
	'export' => [
	'fontAwesome' => true,
	'itemsAfter'=> [
	'<li role="presentation" class="divider"></li>',
	'<li class="dropdown-header">Export All Data</li>',
	$fullExportMenu
	]
	],*/
	]);
	?>
    </div>
</div>
