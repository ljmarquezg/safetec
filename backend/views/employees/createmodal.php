<?php

use yii\helpers\Html;
use yii\web\ForbiddenHttpException;

/* @var $this yii\web\View */
/* @var $model backend\models\Employees */

$this->title = 'Create Employees';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!--?php if(Yii::$app->user->can('employees-create')){?-->
<div class="employees-create row">

    <!--h1><?= Html::encode($this->title) ?></h1-->
    <?php $modelEmployees->employees_status = 1 ?>
    <?= $this->render('_formmodal', [
        'modelEmployees' => $modelEmployees,
    ]) ?>

</div>
        <script type="text/javascript">
        $('.onoffswitch-checkbox').val('1');
        $('.onoffswitch-checkbox').attr('checked', 'checked');
    </script>
<!--?php 
}else{
  
<div class="employees-create row">

	<div class="site-error col-xs-12">

    <h1>Forbidden (#403)</h1>

    <div class="alert alert-danger">
        You are not allow to use this option    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>

</div>

}
?-->
<script type="text/javascript">
	

</script>