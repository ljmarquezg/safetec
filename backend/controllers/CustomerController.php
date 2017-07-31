<?php

namespace backend\controllers;

use Yii;

use backend\models\customer\Customer;
use backend\models\customer\CustomerSearch;

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
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->id_customer_status == 1){
                    $model->id_customer_status = 1;
            }
             if ($model->id_customer_status == 0){
                    $model->id_customer_status = 2;
            }

            if($model->file = UploadedFile::getInstance($model, 'file')){
                    $imageName = 'thumb_'.$modelCustomer->customer_name.'_'.$model->id_customer;
                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    //$path = $_SERVER['DOCUMENT_ROOT'].'/uploads/customer/'.$imageName.'.'.$model->file->extension;
                    $imagePath = '/uploads/customer/'.$imageName.'.'.$model->file->extension;
                    //$model->file->saveAs($path);
                    //save the path in the db
                    $model->image = $imagePath;
                    if ($model->upload())
                        {

                            }
                    }
                

                $model->customer_created = date('Y-m-d');
                $model->save();
                //return $this->redirect(['index']);
                return $this->redirect(['view', 'id' => $model->id_customer]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreatemodal()
    {
        $modelCustomer = new Customer();

        if ($modelCustomer->load(Yii::$app->request->post())) {
            if ($modelCustomer->id_customer_status == 1){
                    $modelCustomer->id_customer_status = 1;
            }
             if ($modelCustomer->id_customer_status == 0){
                    $modelCustomer->id_customer_status = 2;
            }

            if($modelCustomer->file = UploadedFile::getInstance($modelCustomer, 'file')){
                    $imageName = 'thumb_'.$model->customer_name.'_'.$modelCustomer->id_customer;
                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    //$path = $_SERVER['DOCUMENT_ROOT'].'/uploads/customer/'.$imageName.'.'.$model->file->extension;
                    $imagePath = '/uploads/customer/'.$imageName.'.'.$modelCustomer->file->extension;
                    //$model->file->saveAs($path);
                    //save the path in the db
                    $modelCustomer->image = $imagePath;
                    /*if ($model->upload())
                        {

                            }*/
                    }
                $modelCustomer->customer_created = date('Y-m-d');
                if($modelCustomer->save()){
                    echo 1;
                }else{
                    echo 0;
                }
                //return $this->redirect(['index']);
                //return $this->redirect(['view', 'id' => $model->id_customer]);
        } else {
            return $this->renderAjax('createmodal', [
                'modelCustomer' => $modelCustomer,
            ]);
        }
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       if ($model->load(Yii::$app->request->post())) {
            if ($model->id_customer_status == 1){
                    $model->id_customer_status = 1;
            }
             if ($model->id_customer_status == 0){
                    $model->id_customer_status = 2;
            }
                    if($model->file = UploadedFile::getInstance($model, 'file')){
                    $imageName = $model->customer_name.'_'.$model->id_customer;
                    $imageThumb = 'thumb_'.$imageName;

                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    $path = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageName.'.'.$model->file->extension;
                    $pathThumb = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageThumb.'.'.$model->file->extension;
                    $imageThumb = '/uploads/customer/'.$imageThumb.'.'.$model->file->extension;
                    
                    //$model->file->saveAs($path);
                    //save the path in the db
                    
                    if ($model->upload())
                        {

                        }
                    $model->image = $imageThumb;
                }
                $model->save();
                //return $this->redirect(['index']);
                return $this->redirect(['view', 'id' => $model->id_customer]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     /* Find Customers on dataCustomerbase*/
    public function actionCustomerList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id_customer AS id, customer_name AS text, customer_phone AS phone, customer_email AS email, image AS image')
                ->from('customer')
                ->where(['like', 'customer_name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $dataCustomer = $command->queryAll();
            $out['results'] = array_values($dataCustomer);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Customer::find($id)->customer_name];
        }elseif(is_null($q)){
            $query = new Query;
            $query->select('id_customer AS id, customer_name AS text, customer_phone AS phone, customer_email AS email, image AS image')
                ->from('customer')
                ->limit(20);
            $command = $query->createCommand();
            $dataCustomer = $command->queryAll();
            $out['results'] = array_values($dataCustomer);
        }
        return $out;
    }

    /* Find Customers on dataCustomerbase*/
    public function actionCustomerInfo($id_customer) {
        $id_customer = Customer::findOne($id_customer);
        echo Json::encode($id_customer);
    }
}
