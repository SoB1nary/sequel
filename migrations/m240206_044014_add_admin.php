<?php

use yii\db\Migration;

/**
 * Class m240206_044014_add_admin
 */
class m240206_044014_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->insert('users', [
            'username'=> 'admin',
            'email' => 'admin@admin.com',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password' => Yii::$app->security->generatePasswordHash('amogus'),
            'created_at' => date('Y-m-d H-i-s'),
            'updated_at' => date('Y-m-d H-i-s'),
        ]);
    }

    /**php
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240206_044014_add_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240206_044014_add_admin cannot be reverted.\n";

        return false;
    }
    */
}
