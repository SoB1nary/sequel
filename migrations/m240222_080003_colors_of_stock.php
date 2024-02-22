<?php

use yii\db\Migration;

/**
 * Class m240222_080003_colors_of_stock
 */
class m240222_080003_colors_of_stock extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('idx-colors_of_stock-stock_id', 'colors_of_stock');
         $this->createIndex('idx-colors_of_stock-stock_id', 'colors_of_stock', 'stock_id');
        $this->createIndex('idx-stock-stock_id', 'stock', 'stock_id');
        $this->createIndex('idx-colors_of_stock-color_id', 'colors_of_stock', 'stock_id');
         $this->addForeignKey('fk-colors_of_stock-stock_id', 'colors_of_stock', 'stock_id','stock','stock_id', 'CASCADE');
         $this->addForeignKey('fk-colors_of_stock-color_id', 'colors_of_stock', 'color_id','colors','id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240222_080003_colors_of_stock cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240222_080003_colors_of_stock cannot be reverted.\n";

        return false;
    }
    */
}
