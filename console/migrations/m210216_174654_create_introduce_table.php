<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%introduce}}`.
 */
class m210216_174654_create_introduce_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%introduce}}', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string(255),
            'paragraph' => 'LONGTEXT',
            'icon_type' => $this->string(255),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

//        Add Foreign Key lang_id
        $this->addForeignKey(
            '{{%fk-introduce-lang_id}}',
            '{{%introduce}}',
            'lang_id',
            '{{%languages}}',
            'id'
        );

//        Add Index lang_id
        $this->createIndex(
            '{{%idx-introduce-lang_id}}',
            '{{%introduce}}',
            'lang_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        Drop Primary Key lang_id
        $this->dropForeignKey(
            '{{%fk-introduce-lang_id}}',
            '{{%introduce}}'
        );

//        Drop Index lang_id
        $this->dropIndex(
            '{{%idx-introduce-lang_id}}',
            '{{%introduce}}'
        );

        $this->dropTable('{{%introduce}}');
    }
}
