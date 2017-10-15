<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'product_id',
//            'product_number',
            'product_name',
            'category_id',
            'shop_owner_id',
            'description',
            'price',
              [
                'attribute'=>'product_image',
                'format'=>'raw',
                'value'=> function(common\models\product $name) {
                        //by colling function image under product model
                        // return '<img src=" image?filename='.$name->product_image.'" width="80px" height="50px">';
                 return '<img src="' . Yii::$app->request->baseUrl . '/uploads/'.$name->product_image.'" width="120px" height="60"/>';
                }
              ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
