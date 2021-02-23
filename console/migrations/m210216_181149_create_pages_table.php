<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages}}`.
 */
class m210216_181149_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string(255)->notNull(),
            'body' => 'LONGTEXT',
            'lang_id' => $this->integer(11)->unsigned()
        ]);

//        Add Foreign Key lang_id
        $this->addForeignKey(
          '{{%fk-pages-lang_id}}',
          '{{%pages}}',
          'lang_id',
          '{{%languages}}',
          'id'
        );

//        Add Index lang_id
        $this->createIndex(
            '{{%idx-pages-lang_id}}',
            '{{%pages}}',
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
            '{{%fk-pages-lang_id}}',
            '{{%pages}}'
        );

//        Drop Index lang_id
        $this->dropIndex(
            '{{%idx-pages-lang_id}}',
            '{{%pages}}'
        );

        $this->dropTable('{{%pages}}');
    }
}
