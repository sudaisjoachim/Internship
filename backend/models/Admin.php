<?php


namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $admin_id
 * @property string $admin_username
 * @property string $admin_names
 * @property string $admin_password
 * @property string $admin_email
 * @property string $admin_status
 * @property string $created_at
 * @property string $updated_at
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_username'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['admin_username', 'admin_password'], 'string', 'max' => 60],
            [['admin_names'], 'string', 'max' => 100],
            [['admin_email'], 'string', 'max' => 255],
            [['admin_status'], 'string', 'max' => 6],
            [['admin_username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'admin_username' => 'Admin Username',
            'admin_names' => 'Admin Names',
            'admin_password' => 'Admin Password',
            'admin_email' => 'Admin Email',
            'admin_status' => 'Admin Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
