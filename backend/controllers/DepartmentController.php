<?php

namespace backend\controllers;

use Yii;
use backend\models\department\Department;
use backend\models\department\DepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\db\Query;

/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends Controller
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
     * Lists all Department models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Department model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'modelDepartment' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelDepartment = new Department();

        if ($modelDepartment->load(Yii::$app->request->post()) && $modeDepartment->save()) {
            return $this->redirect(['view', 'id' => $modeDepartment->id_department]);
        } else {
            return $this->render('create', [
                'modelDepartment' => $modelDepartment,
            ]);
        }
    }

        public function actionCreatemodal()
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
            return $this->renderAjax('createmodal', [
                'modelDepartment' => $modelDepartment,
            ]);
        }
    }


    /**
     * Updates an existing Department model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelDepartment = $this->findModel($id);

        if ($modelDepartment->load(Yii::$app->request->post()) && $modelDepartment->save()) {
            return $this->redirect(['view', 'id' => $modelDepartment->id_department]);
        } else {
            return $this->render('update', [
                'modelDepartment' => $modelDepartment,
            ]);
        }
    }

    /**
     * Deletes an existing Department model.
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
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($modelDepartment = Department::findOne($id)) !== null) {
            return $modelDepartment;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDepartmentList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'text' => '']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('id_department AS id, description AS text')
            ->from('department')
            ->where(['like', 'description', $q])
            ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => Department::find($id)->description];
    }elseif(is_null($q)){
            $query = new Query;
            $query->select('id_department AS id, description AS text')
                ->from('department')
                ->limit(20);
            $command = $query->createCommand();
            $dataEmployees = $command->queryAll();
            $out['results'] = array_values($dataEmployees);
        }
    return $out;
}

}
