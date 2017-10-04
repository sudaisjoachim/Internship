<?php
namespace backend\models;
use yii\base\Model;
use common\models\Admin;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $id;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $ref_shop_id = '1';
    public $role;
    public $status ;
    public $password;




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['firstname','trim'],
            ['firstname','required'],

            ['lastname','trim'],
            ['lastname','required'],

            ['role','required'],
            ['ref_shop_id','required'],


            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Admin', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 3, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Admin', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 3],
        ];
    }

    /**
     * Signs Admin up.
     *
     * @return Admin|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $admin = new Admin();

        $admin->id =$this->id;
        $admin->firstname =$this->firstname;
        $admin->lastname =$this->lastname;
        $admin->username = $this->username;
        $admin->email = $this->email;
        $admin->ref_shop_id = $this->ref_shop_id;
        $admin->role = $this->role;
        $admin->status = $this->status;
        $admin->setPassword($this->password);
        $admin->generateAuthKey();
        
        return $admin->save() ? $admin : null;
    }
}
