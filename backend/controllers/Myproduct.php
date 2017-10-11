<?php
///**
// * Created by PhpStorm.
// * User: user
// * Date: 10/9/17
// * Time: 12:25 AM
// */
//
//
//namespace backend\controllers;
//use Yii;
//use common\models\product;
//use common\models\shop;
//use backend\models\MyproductInterface;
//use yii\data\ActiveDataProvider;
//use yii\helpers\ArrayHelper;
//use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
///**
// * ItemController implements the CRUD actions for item model.
// */
//class MyproductController extends Controller implements MyproductInterface
//{
//    private $current_owner_shop_id;
//    private $access_denied_msg;
//    /**
//     * @inheritdoc
//     */
//    public function behaviors()
//    {
//        $this->current_owner_shop_id = Yii::$app->user->identity;
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['create', 'update', 'delete', 'add'],
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' =>['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }
//
//
//
//    public function actionIndex($accessErrorMsg = null, $isShopOwner = false)
//    {
//        if (Yii::$app->user->isGuest || !$this->current_owner_shop_id->shop_owner_id) {
//            return $this->goHome();
//        }
//        $shopId = $this->current_user_shop_id->shopId;
//        $isShopOwner = true;
//        $dataProvider = new ActiveDataProvider([
//            'query' => $this->getItemByShopId($shopId),
//        ]);
//        return $this->render('index', [
//            'dataProvider' => $dataProvider, 'message' => $accessErrorMsg, 'isShopOwner' => $isShopOwner
//        ]);
//    }
//    /**
//     * Displays a single item model.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//    /**
//     * Creates a new item model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        // let only the shop owner be able to create the shop.
//        $shopModel = null;
//        if ($this->current_owner_shop_id->shop_owner_id) {
//            $shopModel = Shop::findOne(['id' =>$this->current_owner_shop_id->shop_owner_id]);
//        }
//        if (!$shopModel){
//            return $this->actionIndex("Sorry, Access Permission Denied");
//        }
//        $model = new item();
//        $model ->shop_owner_id = $this->current_owner_shop_id->;;
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model, 'shopList' => $this->getShop(),
//            ]);
//        }
//    }
//    /**
//     * Updates an existing item model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//        if ($model->)
//            Yii::trace($this->current_user_shop_id->shop_owner_id, 'debug');
//        if (!$model->shop_owner_id || $this->current_user_shop_id->shop_owner_id != $model->shop_owner_id){
//            $message = "Sorry, Access Permission Denied, Please try again.";
//            return $this->actionIndex($message);
//        }
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model, 'shopList' => $this->getShop()
//            ]);
//        }
//    }
//    /**
//     * Deletes an existing item model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//        $model = $this->findModel($id);
//        if (!$model->shop_owner_id || $this->current_user_shop_id->shop_owner_id != $model->shop_owner_id){
//            return $this->actionIndex("Sorry, Access Permission Denied");
//        }
//        $this->$model->delete();
//        return $this->redirect(['index']);
//    }
//    // get items list by shop model's id
//    public function actionList($message = null) {
//        $isShopOwner = false;
//        // get shopId from query string
//        $shopId = Yii::$app->request->queryString;
//        if (!Yii::$app->user->isGuest && $this->current_user_shop_id->shopId) {
//            // check whether the shopId of clicked shop and the login user match
//            $isShopOwner = ($shopId == $this->current_user_shop_id->shopId) ? true : false;
//        }
//        $dataProvider = new ActiveDataProvider([
//            'query' => $this->getItemByShopId($shopId),
//        ]);
//        return $this->render('index', [
//            'dataProvider' => $dataProvider, 'message' => $message, 'isShopOwner' => $isShopOwner
//        ]);
//    }
//
//
//    protected function findModel($id)
//    {
//        if (($model = Product::findOne($id)) !== null) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
//    /**
//     * @return array
//     */
//    public function getShop() {
//        $shopList = ArrayHelper::map(Shop::find()->all(), 'shop_owner_id', 'shop_name');
//        return $shopList;
//    }
//
//
//    // get all items in a given shop
//    public function getItemByShopId($current_user_shop_id) {
//        return Product::find()->where(['shop_owner_id' => $current_user_shop_id]);
//    }
//}