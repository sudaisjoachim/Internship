<?php

namespace common\models;
use yii\web\UploadedFile;
use Yii;

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
 *
 * @property Category $category
 * @property Shop $shopOwner
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            ['product_image', 'file',
                'skipOnEmpty' => true,
                'extensions' => 'jpg, gif, png']
            ,
            [['product_number'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['shop_owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_owner_id' => 'shop_owner_id']],
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
            'category_id' => 'Category ID',
            'shop_owner_id' => 'Shop Owner ID',
            'description' => 'Description',
            'price' => 'Price',
            'product_image' => 'Product Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopOwner()
    {
        return $this->hasOne(Shop::className(), ['shop_owner_id' => 'shop_owner_id']);
    }



}
