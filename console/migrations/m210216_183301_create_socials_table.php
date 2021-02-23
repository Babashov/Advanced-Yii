<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%socials}}`.
 */
class m210216_183301_create_socials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%socials}}', [
            'id' => $this->primaryKey()->unsigned(),
            'link' => $this->string(255)->null(),
            'type' => $this->string(255)->null(),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

        //        Add Foreign Key lang_id
        $this->addForeignKey(
            '{{%fk-socials-lang_id}}',
            '{{%socials}}',
            'lang_id',
            '{{%languages}}',
            'id'
        );

//        Add Index lang_id
        $this->createIndex(
            '{{%idx-socials-lang_id}}',
            '{{%socials}}',
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
            '{{%fk-socials-lang_id}}',
            '{{%socials}}'
        );
        //Drop Index lang_id
        $this->dropIndex(
            '{{%idx-socials-lang_id}}',
            '{{%socials}}'
        );
        $this->dropTable('{{%socials}}');
    }
}
