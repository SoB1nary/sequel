<?php

use yii\db\Migration;

/**
 * Class m240219_152336_colors
 */
class m240219_152336_colors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('colors',
            [
                'id'=>$this->primaryKey(),
                'name'=>$this->string(255)->notNull(),
                'hex'=>$this->string()->notNull()
            ]
        );

    }





    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240219_152336_colors cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240219_152336_colors cannot be reverted.\n";

        return false;
    }
    */
}
