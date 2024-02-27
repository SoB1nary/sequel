<?php

use yii\db\Migration;

/**
 * Class m240226_172245_the_fuckening
 */
class m240226_172245_the_fuckening extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->createTable('brands', [
            'id'=> $this->primaryKey(),
            'name'=>$this->string()->notNull()
        ]);
        $this->createIndex('idx-brands-id', 'brands', 'id');

        $this->createTable('categories', [
            'id'=> $this->primaryKey(),
            'name_ru'=>$this->string()->notNull(),
            'name_kz'=>$this->string(),
            'name_en'=>$this->string(),
        ]);
        $this->createIndex('idx-categories-id', 'categories', 'id');

        $this->createTable('car_body_types', [
            'id'=>$this->primaryKey(),
            'name_ru'=>$this->string()->notNull(),
            'name_kz'=>$this->string(),
            'name_en'=>$this->string()
        ]);
        $this->createIndex('idx-car_body_types-id', 'car_body_types', 'id');

        $this->createTable('car_models', [
            'id'=> $this->primaryKey(),
            'brand_id'=> $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'year' => $this->integer()->notNull(),
            'desc_ru' => $this->text(),
            'desc_kz' => $this->text(),
            'desc_en' => $this->text(),
            'body_type'=>$this->integer()
        ]);
        $this->createIndex('idx-car_models-body_type', 'car_models', 'body_type');
        $this->createIndex('idx-car_models-id', 'car_models', 'id');
        $this->createIndex('idx-car_models-brand_id', 'car_models', 'brand_id');
        $this->addForeignKey('fk-car_models_body_type', 'car_models', 'body_type', 'car_body_types', 'id', 'CASCADE');
        $this->addForeignKey('fk-car_models-brand_id', 'car_models', 'brand_id', 'brands', 'id', 'CASCADE');




        $this->createTable('stock', [
            'id'=>$this->primaryKey(),
            'stock_id'=>$this->integer()->notNull(),
            'name_ru'=>$this->string()->notNull(),
            'name_kz'=>$this->string(),
            'name_en'=>$this->string(),
            'amount'=>$this->integer(),
            'created_at'=>$this->dateTime()->notNull(),
            'updated_at'=>$this->dateTime()->notNull(),
            'available'=>$this->boolean(),
            'brand_id'=>$this->integer(),
        ]);
        $this->createIndex('idx-stock-stock_id', 'stock', 'stock_id');
        $this->createIndex('idx-stock-brand_id', 'stock', 'brand_id');
        $this->addForeignKey('fk-stock-brand_id', 'stock', 'brand_id', 'brands', 'id', 'CASCADE');

        $this->createTable('categories_of_stock', [
            'id'=>$this->primaryKey(),
            'stock_id'=>$this->integer()->notNull(),
            'category_id'=>$this->integer()->notNull(),
        ]);

        $this->createIndex('idx-categories_of_stock-stock_id', 'categories_of_stock', 'stock_id');
        $this->createIndex('idx-categories_of_stock-category_id', 'categories_of_stock', 'category_id');
        $this->addForeignKey('fk-categories_of_stock-stock_id', 'categories_of_stock', 'stock_id', 'stock', 'stock_id', 'CASCADE');
        $this->addForeignKey('fk-categories_of_stock-category_id', 'categories_of_stock', 'category_id', 'categories', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240226_172245_the_fuckening cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240226_172245_the_fuckening cannot be reverted.\n";

        return false;
    }
    */
}
