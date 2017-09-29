<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/27/17
 * Time: 12:13 PM
 */
namespace app\models;
use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}