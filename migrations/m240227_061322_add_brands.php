<?php

use yii\db\Migration;

/**
 * Class m240227_061322_add_brands
 */
class m240227_061322_add_brands extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->insert('brands',
    [
        'name'=>'Ferrari'
    ]);
    $this->insert('brands',
    [
        'name'=>'Michelin'

    ]);
    $this->insert('brands',[
        'name'=>'Bingus Petroleum'
    ]);
    $this->insert('brands',[
        'name'=>'Kolhoz Inc.'
    ]);
    $this->insert('brands', [
        'name'=>'Lampochka Corp."'
    ]);
        }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240227_061322_add_brands cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240227_061322_add_brands cannot be reverted.\n";

        return false;
    }
    */
}
