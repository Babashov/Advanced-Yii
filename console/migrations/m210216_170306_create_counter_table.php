<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%counter}}`.
 */
class m210216_170306_create_counter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%counter}}', [
            'id' => $this->primaryKey()->unsigned(),
            'count'=> $this->integer(11),
            'title' => $this->string(255)->notNull(),
            'icon_type' => $this->string(255)->notNull(),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

//        Add Foreign Key lang_id
        $this->addForeignKey(
          '{{%fk-counter-lang_id}}',
          '{{%counter}}',
          'lang_id',
          '{{%languages}}',
          'id'
        );

//        Add index lang_id
        $this->createIndex(
          '{{%idx_counter_lang_id}}',
          '{{%counter}}',
          'lang_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        Drop Foreign Key lang_id
        $this->dropForeignKey(
        '{{%fk-counter-lang_id}}',
        '{{%counter}}'
        );

//        Drop Index lang_id
        $this->dropIndex(
            '{{%idx_counter_lang_id}}',
            '{{%counter}}'
        );
        $this->dropTable('{{%counter}}');
    }
}
