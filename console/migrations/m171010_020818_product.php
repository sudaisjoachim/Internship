<?php

use yii\db\Migration;

/**
 * Class m171010_020818_product
 */
class m171010_020818_product extends Migration
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
        $this->createTable('product', [
            'product_id' => $this->primaryKey(),
            'product_number' => $this->integer()->notNull()->unique(),
            'product_name' =>$this->string(200),
            'category_id' => $this->integer()->notNull(),
            'shop_owner_id' => $this->integer(),
            'description' => $this->string(10000),
            'price' =>$this->integer()->notNull(),
            'product_image'=>$this->string() ,
            'created_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_product_owner_id',
            'product', 'shop_owner_id',
            'shop','shop_owner_id','CASCADE');
        $this->addForeignKey(
            'fk_category_id',
            'product', 'category_id',
            'category','category_id','CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171010_020818_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171010_020818_product cannot be reverted.\n";

        return false;
    }
    */
}
