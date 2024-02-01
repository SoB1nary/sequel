<?php

use yii\db\Migration;

/**
 * Class m240201_114422_users
 */
class m240201_114422_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id'=>$this->primaryKey(),
            'username'=>$this->string(255)->notNull(),
            'password'=>$this->string(255)->notNull(),
            'auth_key'=>$this->string(255)->notNull(),
            'email'=>$this->string(255)->notNull(),
            'created_at'=>$this->dateTime()->notNull(),
            'updated_at'=>$this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240201_114422_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240201_114422_users cannot be reverted.\n";

        return false;
    }
    */
}
