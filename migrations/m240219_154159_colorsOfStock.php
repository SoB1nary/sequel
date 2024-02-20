<?php

use yii\db\Migration;

/**
 * Class m240219_154159_colorsOfStock
 */
class m240219_154159_colorsOfStock extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('colorsOfStock', [
            'id'=>$this->primaryKey(),
            'stock_id'=>$this->integer()->notNull(),
            'color_id'=>$this->integer()->notNull(),
            ]);
        $this->createIndex('idx-colorsOfStock-color', 'colorsOfStock', 'color_id');
        $this->addForeignKey('fk-colorsOfStock-color_id', 'colorsOfStock', 'color_id','colors','id', 'CASCADE');
        $this->createIndex('idx-colorsOfStock-stock', 'colorsOfStock', 'color_id');
        $this->addForeignKey('fk-colorsOfStock-stock_id', 'colorsOfStock', 'stock_id','stock','id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240219_154159_colorsOfStock cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240219_154159_colorsOfStock cannot be reverted.\n";

        return false;
    }
    */
}
