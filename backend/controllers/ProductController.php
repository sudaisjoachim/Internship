<?php

namespace backend\controllers;
use common\models\AdminLoginForm;
use Yii;
use common\models\Product;
use common\models\Shop;
use common\models\SearchProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{

    private $user_shop_owner_id;



    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        $this->user_shop_owner_id = Yii::$app->user->identity;
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex($accessErrorMsg = null, $isShopOwner_id = false)
    {



        if (Yii::$app->user->isGuest || !$this->user_shop_owner_id->ref_shop_id) {
            return $this->goHome();
        }

        $myShop = $this->user_shop_owner_id->ref_shop_id;
        $isShopOwner_id = true;


        $dataProvider = new ActiveDataProvider([
            'query' => $this->getProductByShop_user_id($myShop),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'message' => $accessErrorMsg, 'isShopOwner_id' => $isShopOwner_id
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

            $shopModel = null;

        if ($this->user_shop_owner_id->ref_shop_id) {

            $shopModel = Shop::findOne(['shop_owner_id' => $this->user_shop_owner_id->ref_shop_id]);
        }
        if (!$shopModel) {

            return $this->actionIndex("Sorry, Access Permission Denied");
        }

               $model = new Product();
               $path = Yii::getAlias('@backend').'/web/uploads/';
//               $ran=rand(0,10000);

            if ($model->load(Yii::$app->request->post())) {


                //save the path in the web folder
                $model->product_image = UploadedFile::getInstance($model, 'product_image');
                //Yii::trace(print_r($model->product_image,true));

                if ($model->product_image && $model->validate()) {

                    $model->save();

                    $model->product_image->saveAs($path . $model->product_id. '_' . 'p' . '.' . $model->product_image->extension);

                    //save the path in the db
                    $model->product_image =  $model->product_id . '_' . 'p' . '.' . $model->product_image->extension;

                    $model->save();
                }

                return $this->redirect(['view', 'id' => $model->product_id]);

        }

        return $this->render('create', [
            'model' => $model,
        ]);


    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $path = Yii::getAlias('@backend').'/web/uploads/';
//        $ran=rand(0,10000);

        $shopModel = null;

        if ($this->user_shop_owner_id->ref_shop_id) {

            $shopModel = Shop::findOne(['shop_owner_id' => $this->user_shop_owner_id->ref_shop_id]);
        }
        if (!$shopModel) {

            return $this->actionIndex("Sorry, Access Permission Denied");
        }


        if ($model->load(Yii::$app->request->post())) {

            //save the path in the web folder
            $model->product_image = UploadedFile::getInstance($model, 'product_image');
            //Yii::trace(print_r($model->product_image,true));

            if ($model->product_image && $model->validate()) {
                $model->save();

                $model->product_image->saveAs($path . $model->product_id . '_' . 'p' . '.' . $model->product_image->extension);

                //save the path in the db
                $model->product_image = $model->product_id . '_' . 'p' . '.' . $model->product_image->extension;

                $model->save();
            }

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



//    public function getMyshop() {
//        $myShop = ArrayHelper::map(Shop::find()->all(), 'shop_owner_id', 'shop_name');
//        return $myShop;
//    }



    // get items list by shop model's id
    public function actionMyproduct($message = null) {


        $isShopOwner_id = false;

        // get shopId from query string
        $shop_owner_id_query = Yii::$app->request->queryString;


        if (!Yii::$app->user->isGuest && $this->user_shop_owner_id->shop_owner_id_query) {


            // check whether the shopId of clicked shop and the login user match
            $isShopOwner_id = ($shop_owner_id_query == $this->user_shop_owner_id->shop_owner_id_query) ? true : false;

        }
        $dataProvider = new ActiveDataProvider([


            'query' => $this->getProductByShop_user_id($shop_owner_id_query),

        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'message' => $message, 'isShopOwner_id' => $isShopOwner_id
        ]);
    }



    // get all items in a given shop
    public function getProductByShop_user_id($shop_owner_id) {

        return Product::find()->where(['shop_owner_id' => $shop_owner_id]);
    }


    /*
     * path to upload product images
     */
    public function actionImage($filename)
    {

        $filepath = Yii::getAlias("@backend") . DIRECTORY_SEPARATOR . "web/uploads" . DIRECTORY_SEPARATOR . $filename;

        if(!file_exists($filepath)){

            $filepath = Yii::getAlias("@backend").DIRECTORY_SEPARATOR."web/uploads".DIRECTORY_SEPARATOR."error.jpg";

        }

        return Yii::$app->response->sendFile($filepath);

    }


    /*
     *  view for admin request
     */
    public function actionShow()
    {

        $stringQuery =  Yii::$app->request->queryString;

        $dataProvider = new ActiveDataProvider([
            'query' => $this->getProductByShop_user_id($stringQuery),
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);

    }



}
