<?php

use yii\db\Migration;

/**
 * Class m171002_105158_admin
 */
class m171002_105158_admin extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('admin', [
            'admin_id' => $this->primaryKey(),
            'admin_username' => $this->string(60)->notNull()->unique(),
            'admin_names'=>$this->string(100),
            'admin_password' => $this->string(60),
            'admin_email'=>$this->string(255),
            'admin_status'=>$this->string(6),
            'created_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"),
        ], $tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171002_105158_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171002_105158_admin cannot be reverted.\n";

        return false;
    }
    */
}
