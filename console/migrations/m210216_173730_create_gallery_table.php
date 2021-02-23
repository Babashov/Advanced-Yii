<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gallery}}`.
 */
class m210216_173730_create_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gallery}}', [
            'id' => $this->primaryKey()->unsigned(),
            'file_type' => $this->string(255),
            'file_url' => $this->string(255),
            'table_type' => $this->string(255),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

//        Add Foreign Key lang_id
        $this->addForeignKey(
            '{{%fk-gallery-lang_id}}',
            '{{%gallery}}',
            'lang_id',
            '{{%languages}}',
            'id'
        );

//        Add Index lang_idi
        $this->createIndex(
            '{{%idx-gallery-lang_id}}',
            '{{%gallery}}',
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
            '{{%fk-gallery-lang_id}}',
            '{{%gallery}}'
        );

//      Drop Index lang_id
        $this->dropIndex(
            '{{%idx-gallery-lang_id}}',
            '{{%gallery}}'
        );

        $this->dropTable('{{%gallery}}');
    }
}
