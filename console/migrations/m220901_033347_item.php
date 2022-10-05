<?php

use yii\db\Migration;

/**
 * Class m220901_033347_item
 */
class m220901_033347_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{item}}', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(255)->notNull()->unique(),
            'price' => $this->integer(11)->notNull(),
            'category_id' => $this->integer(11)
        ], $tableOptions);

        $this->addForeignKey(
            'fk_item_category',
            '{{item}}',
            'category_id',
            '{{item_category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{item}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220901_033347_item cannot be reverted.\n";

        return false;
    }
    */
}
