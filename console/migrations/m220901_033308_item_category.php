<?php

use yii\db\Migration;

/**
 * Class m220901_033308_item_category
 */
class m220901_033308_item_category extends Migration
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
        
        $this->createTable('{{item_category}}', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(255)->notNull()->unique(),
            'parent_Category' => $this->integer(11)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{item_category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220901_033308_item_category cannot be reverted.\n";

        return false;
    }
    */
}
