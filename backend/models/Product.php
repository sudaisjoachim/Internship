<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * This is the model class for table "product".
 *
 * @property int $product_id
 * @property int $product_number
 * @property string $product_name
 * @property int $category_id
 * @property int $shop_owner_id
 * @property string $description
 * @property int $price
 * @property string $product_image
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_number', 'category_id', 'price'], 'required'],
            [['product_number', 'category_id', 'shop_owner_id', 'price'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_name'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 10000],
            [['file'], 'file'],
//            [['product_image'], 'string', 'max' => 255],
            [['product_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_number' => 'Product Number',
            'product_name' => 'Product Name',
            'category_id' => 'Category name',
            'shop_owner_id' => 'Shop name',
            'description' => 'Description',
            'price' => 'Price',
            'product_image'=>' Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getAll() {

        $quy= Product::find()->select (['product_name','product_image','shop_owner_id','price','category_id']);
        $dataProvider = new ActiveDataProvider([
            'query' => $quy,
        ]);

        return $dataProvider;
    }

    /**
     * @return string
     */

    public function getAll2() {

        return  Category::findOne(['category_id'=> $this->category_id])->category_name;
    }


    public function getAll3() {

        return  Shop::findOne(['shop_owner_id'=> $this->shop_owner_id])->shop_name;
    }


}
