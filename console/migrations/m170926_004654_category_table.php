<?php

use yii\db\Migration;

/**
 * Class m170926_004654_category_table
 */
class m170926_004654_category_table extends Migration
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
        $this->createTable('category', [

            'category_id' => $this->primaryKey(),
            'category_number' => $this->integer()->notNull()->unique(),
            'description' => $this->string(10000),
            'created_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"),

        ], $tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170926_004654_category_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170926_004654_category_table cannot be reverted.\n";

        return false;
    }
    */
}
