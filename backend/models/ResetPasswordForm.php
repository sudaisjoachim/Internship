<?php
namespace backend\models;
use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\Admin;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    private $_admin;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Password reset token cannot be blank.');
        }
        $this->_admin = Admin::findByPasswordResetToken($token);
        if (!$this->_admin) {
            throw new InvalidParamException('Wrong password reset token.');
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 3],
        ];
    }

    /**
     * @return bool
     */
    public function resetPassword()
    {
        $admin = $this->_admin;
        $admin->setPassword($this->password);
        $admin->removePasswordResetToken();

        return $admin->save(false);
    }
}
