<?php

use yii\db\Migration;

/**
 * Class m240216_060656_countries
 */
class m240216_060656_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('countries', [
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255)->notNull(),]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240216_060656_countries cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240216_060656_countries cannot be reverted.\n";

        return false;
    }
    */
}
