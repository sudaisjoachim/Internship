<?php

namespace backend\controllers;
use yii\web\Controller;
use app\models\Country;
use yii;


class CountryController extends \yii\web\Controller
{
    public function actionMycountries()
    {


        $countryQuery = Yii::$app->db->createCommand("SELECT name from country where code = 'AU'")->queryAll();

      echo "<pre>";

      print_r($countryQuery);

//        return $this->redirect('index',['country' => $productQuery]);
    }

}
