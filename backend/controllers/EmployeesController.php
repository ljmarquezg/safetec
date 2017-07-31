<?php

namespace backend\controllers;

use Yii;
use backend\models\employees\Employees;
use backend\models\employees\EmployeesSearch;
use backend\models\attendance\AttendanceSearch;
use backend\models\attendance\Attendance;
use backend\models\department\Department;
use backend\models\department\DepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\db\Query;
/**
 * EmployeesController implements the CRUD actions for Employees model.
 */
class EmployeesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employees models.
     * @return mixed
     */
    public function actionIndex()
    {   

        $searchModel = new EmployeesSearch();
        //$searchModelAttendance = new AttendanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=20;
        //$dataProvider->query->where('Employees_Department <> 1');

        return $this->render('index', [
            'searchModel' => $searchModel,
            //'searchModelAttendance' => $searchModelAttendance,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employees model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new EmployeesSearch();
        $searchModelAttendance = new AttendanceSearch();
        $dataProviderAttendance = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendance->query->where('employees.id_employees ='. $model->id_employees.'');
/*        $dataProviderAttendance->pagination  = false;*/
        $dataProviderAttendance->pagination->pageSize=20;

        $dataProviderAttendanceVacations = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceVacations->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 1');

        $dataProviderAttendanceSick = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceSick->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 2')->orWhere('Attendandce_Type_ID = 3');

        $dataProviderAttendanceCasual = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceCasual->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 4')->orWhere('Attendandce_Type_ID = 5');

        $dataProviderAttendanceNoContact = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceNoContact->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 6');

        $dataProviderAttendanceLate = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceLate->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 7');

        $dataProviderAttendanceOther = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceOther->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 8');

        $dataProviderAttendanceBereavement = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceBereavement->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 9');

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'searchModelAttendance' => $searchModelAttendance,
                'dataProviderAttendance' => $dataProviderAttendance,
                'dataProviderAttendanceVacations' => $dataProviderAttendanceVacations,
                'dataProviderAttendanceSick' => $dataProviderAttendanceSick,
                'dataProviderAttendanceCasual' => $dataProviderAttendanceCasual,
                'dataProviderAttendanceNoContact' => $dataProviderAttendanceNoContact,
                'dataProviderAttendanceLate' => $dataProviderAttendanceLate,
                'dataProviderAttendanceOther' => $dataProviderAttendanceOther,
                'dataProviderAttendanceBereavement' => $dataProviderAttendanceBereavement,
        ]);
    }

    /**
     * Creates a new Employees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
public function actionCreate()
    {
        //if(Yii::$app->user->can('employees-create')){

            $model = new Employees();
           /* $current_image = $model->image;

            if ($model->load(Yii::$app->request->post())) {
                
                $imageName = $model->employees_name.''.$model->id_employees;
                //get the file
                $model->file = UploadedFile::getInstance($model, 'file');

                 if(!empty($model->file) && $model->file->size !== 0) {
                    $path = 'uploads/employees/'.$imageName.'.'.$model->file->extension;
                    $model->file->saveAs($path);
                    //save the path in the db
                    $model->image = $path;
                    }else{
                        $model->image = $current_image;
                    }*/
                    if ($model->load(Yii::$app->request->post())) {
                        if ($model->employees_status == 1){
                                $model->employees_status = 1;
                        }
                         if ($model->employees_status == 0){
                                $model->employees_status = 2;
                        }

                
                if($model->file = UploadedFile::getInstance($model, 'file')){
                    $imageName = 'thumb_'.$model->employees_name.'_'.$model->id_employees;
                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    //$path = $_SERVER['DOCUMENT_ROOT'].'/uploads/employees/'.$imageName.'.'.$model->file->extension;
                    $imagePath = '/uploads/employees/'.$imageName.'.'.$model->file->extension;
                    //$model->file->saveAs($path);
                    //save the path in the db
                    $model->image = $imagePath;
                    if ($model->upload())
                        {

                            }
                    }
                

                $model->employees_created = date('Y-m-d');
                $model->save();
                return $this->redirect(['view', 'id' => $model->id_employees]);

            } else {
                //return $this->renderAjax('create', [
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        //}else{
           // throw new ForbiddenHttpException;
        //}
    }

    /**
     * Updates an existing Employees model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
public function actionCreatemodal()
    {
        //Yii::$app->MyScripts->modal();
        
            $modelEmployees = new Employees();

            /*if ($model->load(Yii::$app->request->post())) {
                if (is_null($model->file)){
                }else{
                $imageName = $model->employees_name.''.$model->id_employees;
                //get the file
                $model->file = UploadedFile::getInstance($model, 'file');
                //$path = 'uploads/employees/'.$imageName.'.'.$model->file->extension;
                $model->file->saveAs($path);
                //save the path in the db
                $model->image = $path;
                }*/

            if ($modelEmployees->load(Yii::$app->request->post())) {
            if ($modelEmployees->employees_status == 1){
                    $modelEmployees->employees_status = 1;
            }
             if ($modelEmployees->employees_status == 0){
                    $modelEmployees->employees_status = 2;
            }

                
                if($modelEmployees->file = UploadedFile::getInstance($modelEmployees, 'file')){
                    $imageName = 'thumb_'.$modelEmployees->employees_name.'_'.$modelEmployees->id_employees;
                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    //$path = $_SERVER['DOCUMENT_ROOT'].'/uploads/employees/'.$imageName.'.'.$model->file->extension;
                    $imagePath = '/uploads/employees/'.$imageName.'.'.$modelEmployees->file->extension;
                    //$model->file->saveAs($path);
                    //save the path in the db
                    $modelEmployees->image = $imagePath;
                    if ($modelEmployees->upload())
                        {

                            }
                }

                $modelEmployees->employees_created = date('Y-m-d h:m:s');

                //$model->save();
                //return $this->redirect(['view', 'id' => $model->id_employees]);
                if($modelEmployees->save()){
                    echo 1;
                }else{
                    echo 0;
                }
            } else {
                return $this->renderAjax('createmodal', [
                //return $this->render('create', [
                    'modelEmployees' => $modelEmployees,
                ]);
            }
        
    }

        public function actionCreatemodaldepartment()
    {
        $modelDepartment = new Department();

        if ($modelDepartment->load(Yii::$app->request->post())) {

                if($modelDepartment->save()){
                    echo 1;
                }else{
                    echo 0;
                };

                $modelDepartment->save();

            //return $this->redirect(['view', 'id' => $model->id_department]);
        } else {
            return $this->renderAjax('createmodaldepartment', [
                'modelDepartment' => $modelDepartment,
            ]);
        }
    }

 public function actionForbiddenexception()
    {
            return $this->renderAjax('forbiddenexception');
    }

    /**
     * Updates an existing Employees model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $searchModelAttendance = new AttendanceSearch();
        $dataProviderAttendance = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendance->query->where('employees.id_employees ='. $model->id_employees.'');
        $dataProviderAttendance->pagination  = false;

        $dataProviderAttendanceVacations = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceVacations->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 1');

        $dataProviderAttendanceSick = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceSick->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 2')->orWhere('Attendandce_Type_ID = 3');

        $dataProviderAttendanceCasual = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceCasual->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 4')->orWhere('Attendandce_Type_ID = 5');

        $dataProviderAttendanceNoContact = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceNoContact->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 6');

        $dataProviderAttendanceLate = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceLate->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 7');

        $dataProviderAttendanceOther = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceOther->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 8');

        $dataProviderAttendanceBereavement = $searchModelAttendance->search(Yii::$app->request->queryParams);
        $dataProviderAttendanceBereavement->query->where('employees.id_employees ='. $model->id_employees.'')->andWhere('Attendandce_Type_ID = 9');
        if ($model->load(Yii::$app->request->post())) {
            if ($model->employees_status == 1){
                    $model->employees_status = 1;
            }
             if ($model->employees_status == 0){
                    $model->employees_status = 2;
            }

                
                if($model->file = UploadedFile::getInstance($model, 'file')){
                    $imageName = 'thumb_'.$model->employees_name.'_'.$model->id_employees;
                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    //$path = $_SERVER['DOCUMENT_ROOT'].'/uploads/employees/'.$imageName.'.'.$model->file->extension;
                    $imagePath = '/uploads/employees/'.$imageName.'.'.$model->file->extension;
                    //$model->file->saveAs($path);
                    //save the path in the db
                    $model->image = $imagePath;
                    if ($model->upload())
                        {

                            }
                }

                $model->save();
            return $this->redirect(['view', 'id' => $model->id_employees]);
                /*return $this->render('update', [
                'model' => $model,
                'searchModelAttendance' => $searchModelAttendance,
                'dataProviderAttendance' => $dataProviderAttendance,
                'dataProviderAttendanceVacations' => $dataProviderAttendanceVacations,
                'dataProviderAttendanceSick' => $dataProviderAttendanceSick,
                'dataProviderAttendanceCasual' => $dataProviderAttendanceCasual,
                'dataProviderAttendanceNoContact' => $dataProviderAttendanceNoContact,
                'dataProviderAttendanceLate' => $dataProviderAttendanceLate,
                'dataProviderAttendanceOther' => $dataProviderAttendanceOther,
                'dataProviderAttendanceBereavement' => $dataProviderAttendanceBereavement,

            ]);*/
        } else {
            return $this->render('update', [
                'model' => $model,
                'searchModelAttendance' => $searchModelAttendance,
                'dataProviderAttendance' => $dataProviderAttendance,
                'dataProviderAttendanceVacations' => $dataProviderAttendanceVacations,
                'dataProviderAttendanceSick' => $dataProviderAttendanceSick,
                'dataProviderAttendanceCasual' => $dataProviderAttendanceCasual,
                'dataProviderAttendanceNoContact' => $dataProviderAttendanceNoContact,
                'dataProviderAttendanceLate' => $dataProviderAttendanceLate,
                'dataProviderAttendanceOther' => $dataProviderAttendanceOther,
                'dataProviderAttendanceBereavement' => $dataProviderAttendanceBereavement,

            ]);
        }
    }

    /**
     * Deletes an existing Employees model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employees::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

 /* Find Customers on database*/
    public function actionEmployeesList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id_employees AS id, employees_name AS text')
                ->from('employees')
                ->where(['like', 'employees_name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $dataEmployees = $command->queryAll();
            $out['results'] = array_values($dataEmployees);
        }elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Employees::find($id)->customer_name];
        }elseif(is_null($q)){
            $query = new Query;
            $query->select('id_employees AS id, employees_name AS text')
                ->from('employees')
                ->limit(20);
            $command = $query->createCommand();
            $dataEmployees = $command->queryAll();
            $out['results'] = array_values($dataEmployees);
        }
        return $out;
    }
}