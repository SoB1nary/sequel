<?php

use yii\db\Migration;

/**
 * Class m240207_051811_stock
 */
class m240213_163011_stock extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('stock', [
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255)->notNull(),
            'brand_id'=>$this->integer()->notNull(),
            'desc'=>$this->text(),
            'amount'=>$this->integer()->notNull(),
            'available'=>$this->boolean()->notNull(),
            'updated_at'=>$this->dateTime()->notNull(),
            
        ]);
        $this->createIndex('idx-stock-brand_id', 'stock', 'brand_id');
        $this->addForeignKey('fk-stock-brand_id', 'stock', 'brand_id','brands','id', 'CASCADE');
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
