<?php

use yii\db\Migration;

/**
 * Class m170926_031447_shoppingcart_table
 */
class m170926_031447_shoppingcart_table extends Migration
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
        $this->createTable('shoppingcart', [

            'shoppingcart_id' => $this->primaryKey(),
            'customer_id'=>$this->string(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"),

        ], $tableOptions);

//        $this->addForeignKey(
//            'fk_customer_id',
//            'shoppingcart', 'customer_id',
//            'customer','customer_id','CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170926_031447_shoppingcart_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170926_031447_shoppingcart_table cannot be reverted.\n";

        return false;
    }
    */
}
