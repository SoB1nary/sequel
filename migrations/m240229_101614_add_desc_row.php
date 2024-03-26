<?php

use yii\db\Migration;

/**
 * Class m240229_101614_add_desc_row
 */
class m240229_101614_add_desc_row extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('stock', 'desc', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240229_101614_add_desc_row cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240229_101614_add_desc_row cannot be reverted.\n";

        return false;
    }
    */
}
