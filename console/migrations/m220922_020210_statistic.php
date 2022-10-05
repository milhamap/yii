<?php

use yii\db\Migration;

/**
 * Class m220922_020210_statistic
 */
class m220922_020210_statistic extends Migration
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
        
        $this->createTable('{{statistic}}', [
            'id' => $this->primaryKey(11),
            'access_time' => $this->dateTime()->null(),
            'user_ip' => $this->string(255)->null(),
            'user_host' => $this->string(255)->null(),
            'path_info' => $this->string(255)->null(),
            'query_string' => $this->string(255)->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{statistic}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220922_020210_statistic cannot be reverted.\n";

        return false;
    }
    */
}
