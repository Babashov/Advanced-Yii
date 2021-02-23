<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%about_us}}`.
 */
class m210216_162841_create_about_us_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%about_us}}', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string()->notNull(),
            'paragraph' => 'LONGTEXT',
            'video_link' => $this->string()->null()->defaultValue(null),
            'image' => $this->string(2000)->null()->defaultValue(null),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

//        Create Index for lang_id
        $this->createIndex(
            '{{%idx-about_us-lang_id}}',
            '{{%about_us}}',
            'lang_id'
        );

//        Add Foreign Key for {{user}} table
        $this->addForeignKey(
            '{{%fk-about_us-lang_id}}',
            '{{%about_us}}',
            'lang_id',
            '{{%languages}}',
            'id',
            'RESTRICT',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        Drop Foreign Key lang_id
        $this->dropForeignKey(
            '{{%fk-about_us-lang_id}}',
            '{{%about_us}}'
        );
//        Drop Index lang_id
        $this->dropIndex(
            '{{%idx-about_us-lang_id}}',
            '{{%about_us}}'
        );
        $this->dropTable('{{%about_us}}');
    }
}
