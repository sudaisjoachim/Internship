<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/29/17
 * Time: 10:46 PM
 */

namespace  common\models\Product;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

//use app\models\Category;
//use app\models\Product;

$this->title = 'Products Show';
//$this->params['breadcrumbs'][] = $this->title;

?>
    <div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

        <?php  Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider2,
//            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

        //          'product_id',
        //          'product_number',
                    'product_name',
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'category Name',
                    'format' => 'text',
                    'value' =>function($pro){
                        return  $pro->getAll2();
                    },

                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'Shop name',
                    'format' => 'text',
                    'value' =>function($pro){
                        return  $pro->getAll3();
                    },

                ],
                'description',
                'price',
                'product_image',
                //'created_at',
                //'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?php Pjax::end(); ?>

    </div>


   