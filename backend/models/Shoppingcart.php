<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shoppingcart".
 *
 * @property int $shoppingcart_id
 * @property string $customer_id
 * @property string $created_at
 * @property string $updated_at
 */
class Shoppingcart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shoppingcart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['customer_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shoppingcart_id' => 'Shoppingcart ID',
            'customer_id' => 'Customer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
