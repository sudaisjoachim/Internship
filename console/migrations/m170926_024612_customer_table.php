<?php

use yii\db\Migration;

/**
 * Class m170926_024612_customer_table
 */
class m170926_024612_customer_table extends Migration
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
        $this->createTable('customer', [
            'customer_id' => $this->primaryKey(),
            'customer_username' => $this->integer()->notNull()->unique(),
            'customer_password' => $this->string(),
            'customer_address' => $this->string(500),
            'customer_phone'=>$this->string(12),
            'customer_email'=>$this->string(60),
            'created_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"),
        ], $tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170926_024612_customer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170926_024612_customer_table cannot be reverted.\n";

        return false;
    }
    */
}
