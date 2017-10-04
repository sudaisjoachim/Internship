<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

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
    public $ref_shop_id;
    public $role ;
    public $status ;
    public $password;





    public function attributeLabels()
    {
        return [
            'id' => 'USER ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'email' => 'Email',
            'ref_shop_id' => 'Shop ID',
            'role'=>' role',

        ];
    }
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
            ['status','required'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 3, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 3],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();

        $user->id =$this->id;
        $user->firstname =$this->firstname;
        $user->lastname =$this->lastname;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->ref_shop_id = $this->ref_shop_id;
        $user->role = $this->role;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
