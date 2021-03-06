<?php

namespace frontend\controllers;
use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
public $productQuery="";

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],

            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update','delete'],

                'rules' => [ [

                    'allow' => true,
                    'roles' => ['@'],
                ],
                ],

            ]
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        $searchModel2 = new Product;

        $dataP = $searchModel2->getAll();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataP,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        //get the instance of the uploaded file

            if ($model->load(Yii::$app->request->post())) {


                $imagename = $model->product_name;
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('upload/'.$imagename.'.'.$model->file->extension);

                //save the the path in the DB column
                $model->product_image = 'upload/'.$imagename.'.'.$model->file->extension;
                $model->save();
                return $this->redirect(['view', 'id' => $model->product_id]);
            }



            return $this->render('create', [
                'model' => $model,
            ]);


    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionShow()
    {

      //  $searchModel2 = new Product;

//        $dataP = $searchModel2->getAll();
//
//        $data = $searchModel2->getCategory_name();
//
//        return $this->render('product_show', [
//
////            'searchModel2' => $searchModel2,
//            'dataProvider2' => $dataP,
////            'data3' => $data,
//
//        ]);

        $dataProvider = new ActiveDataProvider(
            ['query' => Product::find()]
        );

        return $this->render('product_show', [
             //'searchModel' => $searchModel2,
            'dataProvider2' => $dataProvider,
        ]);

    }



}
