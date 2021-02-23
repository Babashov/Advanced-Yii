<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%translations}}`.
 */
class m210216_183733_create_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%translations}}', [
            'id' => $this->primaryKey()->unsigned(),
            'word' => 'text',
            'place' => $this->string(255)->null(),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

        //        Add Foreign Key lang_id
        $this->addForeignKey(
            '{{%fk-translations-lang_id}}',
            '{{%translations}}',
            'lang_id',
            '{{%languages}}',
            'id'
        );

//        Add Index lang_id
        $this->createIndex(
            '{{%idx-translations-lang_id}}',
            '{{%translations}}',
            'lang_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //Drop Foreign Key lang_id
        $this->dropForeignKey(
            '{{%fk-translations-lang_id}}',
            '{{%translations}}'
        );
        //Drop Index lang_id
        $this->dropIndex(
            '{{%idx-translations-lang_id}}',
            '{{%translations}}'
        );

        $this->dropTable('{{%translations}}');
    }
}
