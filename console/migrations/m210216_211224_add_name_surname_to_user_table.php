<?php

use yii\db\Migration;

/**
 * Class m210216_211224_add_name_surname_to_user_table
 */
class m210216_211224_add_name_surname_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','name',$this->string()->after('id'));
        $this->addColumn('user','surname',$this->string()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210216_211224_add_name_surname_to_user_table cannot be reverted.\n";
        $this->dropColumn('user','name');
        $this->dropColumn('user','surname');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_211224_add_name_surname_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
