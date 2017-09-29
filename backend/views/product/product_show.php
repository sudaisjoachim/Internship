<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/29/17
 * Time: 10:46 PM
 */


use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Products Show';
//$this->params['breadcrumbs'][] = $this->title;

?>
    <div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
 <?=

     GridView::widget([
    'dataProvider' => $dataProvider2,
    'filterModel' => $searchModel2,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

//           'product_id',
//          'product_number',
            'product_name',
            'category_id',
            'shop_owner_id',
            'description',
            'price',
            'product_image',
//        //'created_at',
          //'updated_at',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);

 ?>

    </div>
