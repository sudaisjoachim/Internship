<?php

namespace common\models;


class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dob', 'created_at', 'updated_at'], 'safe'],
            [['customer_username', 'customer_email'], 'string', 'max' => 60],
            [['customer_password'], 'string', 'max' => 255],
            [['customer_address'], 'string', 'max' => 500],
            [['customer_phone'], 'string', 'max' => 12],
            [['customer_username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'customer_username' => 'Customer Username',
            'customer_password' => 'Customer Password',
            'customer_address' => 'Customer Address',
            'customer_phone' => 'Customer Phone',
            'dob' => 'Dob',
            'customer_email' => 'Customer Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
