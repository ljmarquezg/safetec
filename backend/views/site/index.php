<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
use backend\assets\DashboardAsset;
DashboardAsset::register($this);
$this->title = 'My Yii Application';
?>
<!--?php if (!Yii::$app->user->isGuest) {
$user_role =  Yii::$app->user->identity->getRoleName();
}
if ($user_role == 'attendance' or $user_role == 'admin'){ 
?-->
<script src="/js/bootstrap.js"></script>
<div class="site-index">
  <div class="box box-primary attendance">
    <div class="box-header with-border">
      <h3 class="box-title">Attendance</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button><!--button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts"><i class="fa fa-comments"></i></button><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button-->
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <a href="../employees/" style="visibility:none; position:absolute; top:0; bottom:0; left:0; right:0; z-index: 1">
            </a>
            <h3><?php
              $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM Employees')
              ->queryScalar();
              echo $count;
              ?>   
            </h3>
            <p>Employees List <i class="fa fa-arrow-circle-right"></i></p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="../employees/create/" class="small-box-footer">New Employee <i class="fa fa-plus-circle"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <a href="../department/" style="visibility:none; position:absolute; top:0; bottom:0; left:0; right:0; z-index: 1"></a>
            <h3><?php
              $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM Department')
              ->queryScalar();
              echo $count;
              ?> 
            </h3>

            <p>Departments List <i class="fa fa-arrow-circle-right"></i></p>
          </div>
          <div class="icon">
            <i class="ion ion-briefcase"></i>
          </div>
          <a href="#" class="small-box-footer">New Department <i class="fa fa-plus-circle"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <a href="../attendance/" style="visibility:none; position:absolute; top:0; bottom:0; left:0; right:0; z-index: 1">
            </a>
            <h3><?php
              $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM Attendance')
              ->queryScalar();
              echo $count;
              ?>   
            </h3>
            <p>Attendance List <i class="fa fa-arrow-circle-right"></i></p>
          </div>
          <div class="icon">
            <i class="ion ion-clipboard"></i>
          </div>
          <a href="../attendance/create/" class="small-box-footer">New Attendance <i class="fa fa-plus-circle"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="box-footer">
    </div>
  </div>
</div>


