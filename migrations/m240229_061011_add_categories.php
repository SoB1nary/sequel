<?php

use yii\db\Migration;

/**
 * Class m240229_061011_add_categories
 */
class m240229_061011_add_categories extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $c='categories';
        $this->insert($c, [
            'name_ru'=>"Двигатели",
            'name_en'=>'Engines',
        ]);
        $this->insert($c, [
            'name_ru'=>'Шины',
            'name_en'=>'Tires',
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240229_061011_add_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240229_061011_add_categories cannot be reverted.\n";

        return false;
    }
    */
}
