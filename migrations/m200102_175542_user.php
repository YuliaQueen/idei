<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200102_175542_user
 */
class m200102_175542_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id'            => Schema::TYPE_PK,
            'username'      => Schema::TYPE_STRING . '(25) NOT NULL',
            'email'         => Schema::TYPE_STRING . '(255) NOT NULL',
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200102_175542_user cannot be reverted.\n";

        return false;
    }
    */
}
