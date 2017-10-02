<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/1/17
 * Time: 11:09 AM
 */

namespace app\controllers;

namespace backend\controllers;
use Yii;
use app\models\Dashboard;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DashboardController extends Controller{


    public function actionIndex(){

        $this->layout = "dashboardLayout";

        return $this->render('index');
}



}