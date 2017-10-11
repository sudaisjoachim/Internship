<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Product;

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
//             [
//                 'attribute'=>'product_image',
//                 'value'=> Yii::getAlias('@backend').'/web/uploads/',
//                 'format'=>['image',['width'=>'100','height'=>'100']],
//
//
//             ],

           'product_image',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
