<?php

namespace common\models;




class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_number'], 'required'],
            [['category_number'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['category_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 10000],
            [['category_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'category_number' => 'Category Number',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }




}
