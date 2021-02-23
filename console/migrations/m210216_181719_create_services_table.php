<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m210216_181719_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string(255)->notNull(),
            'paragraph' => 'LONGTEXT',
            'cover_image' => $this->string(255)->null(),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

//        Add Primary Key lang_id
        $this->addForeignKey(
            '{{%fk-services-lang_id}}',
            '{{%services}}',
            'lang_id',
            '{{%languages}}',
            'id'
        );

//        Add Index lang_id
        $this->createIndex(
            '{{%idx-services-lang_id}}',
            '{{%services}}',
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
            '{{%fk-services-lang_id}}',
            '{{%services}}'
        );

//        Drop Index lang_id
        $this->dropIndex(
            '{{%idx-services-lang_id}}',
            '{{%services}}'
        );

        $this->dropTable('{{%services}}');
    }
}
