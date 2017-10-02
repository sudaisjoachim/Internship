<?php

namespace app\models;
use yii\data\ActiveDataProvider;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $category_id
 * @property string $category_name
 * @property int $category_number
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
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
//    public function getCategory_name()
//    {
//        $model = category::find()
//            ->joinWith('product')
//            ->all();
//
//        $query = category::find();
//        $query->joinWith(['Product']);
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//        ]);
//        $query->andFilterWhere(['like', 'category_name', $this->category_name])
//            ->andFilterWhere(['like', 'product.category_id', $this->category_id]);
//        return $dataProvider;
//    }




}
