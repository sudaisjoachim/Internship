<?php
namespace  common\models;

class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_number'], 'required'],
            [['shop_name'], 'string', 'max' => 60],
            [['shop_number'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['shop_owner_names'], 'string', 'max' => 50],
            [['shop_address'], 'string', 'max' => 500],
            [['shop_email'], 'string', 'max' => 60],
            [['shop_phone'], 'string', 'max' => 12],
            [['description'], 'string', 'max' => 10000],
            [['shop_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shop_owner_id' => 'Shop Owner ID',
            'shop_name'=>'Shop name',
            'shop_number' => 'Shop Number',
            'shop_owner_names' => 'Shop Owner Names',
            'shop_address' => 'Shop Address',
            'shop_email' => 'Shop Email',
            'shop_phone' => 'Shop Phone',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getShop()
    {
        return Shop::find()->select(['shop_name', 'shop_owner_id'])->asArray()->all();

    }
}
