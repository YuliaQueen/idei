<?php

use yii\db\Migration;

/**
 * Class m200102_182602_add_password_column_from_users_table
 */
class m200102_182602_add_password_column_from_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'password', 'varchar(100)');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'password');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200102_182602_add_password_column_from_users_table cannot be reverted.\n";

        return false;
    }
    */
}
