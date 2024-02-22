<?php

use yii\db\Migration;

/**
 * Class m240220_085429_stock
 */
class m240220_085429_stock extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('stock',
    [
        'id'=>$this->primaryKey(),
        'stock_id'=>$this->integer()->notNull(),
        'name'=>$this->string()->notNull(),
        'desc'=>$this->text()->notNull(),
        'amount'=>$this->integer()->notNull(),
        'brand_id'=>$this->integer()->notNull(),
        'available'=>$this->boolean()->notNull(),
        'updated_at'=>$this->dateTime()->notNull(),
        'created_at'=>$this->dateTime()->notNull(),
    ]);
        $this->createIndex('idx-stock-brand_id', 'stock', 'brand_id');
        $this->addForeignKey('fk-stock-brand_id', 'stock', 'brand_id','brands','id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240220_085429_stock cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240220_085429_stock cannot be reverted.\n";

        return false;
    }
    */
}
