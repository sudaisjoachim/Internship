<?php

namespace common\models;
use yii\base\Model;


class UploadForm extends Model {

    public $product_image;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            ['product_image', 'file',
                'skipOnEmpty' => true,
                'extensions' => 'jpg, gif, png']

        ];
    }

}
