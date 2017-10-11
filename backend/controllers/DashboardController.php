<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/1/17
 * Time: 11:09 AM
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\ShopSearch;




class DashboardController extends Controller{

//
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['index', 'update', 'view', 'delete'],
//                        'allow' => true,
//                        'roles' => ['admin'],
//                    ],
//                ],
//
//            ],  ];
//
//    }
    public function actionIndex(){

        $this->layout = "dashboardLayout";


        $searchModel = new ShopSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

//        return $this->render('index');
}

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

}