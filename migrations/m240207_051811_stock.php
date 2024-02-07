<?php

use yii\db\Migration;

/**
 * Class m240207_051811_stock
 */
class m240207_051811_stock extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('stock', [
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255)->notNull(),
            'brand'=>$this->string(255)->notNull(),
            'desc'=>$this->string(255)->notNull(),
            'amount'=>$this->integer()->notNull(),
            'available'=>$this->boolean()->notNull(),
            'updated_at'=>$this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240207_051811_stock cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240207_051811_stock cannot be reverted.\n";

        return false;
    }
    */
}
