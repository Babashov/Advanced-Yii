<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sliders}}`.
 */
class m210216_182923_create_sliders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sliders}}', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string(255)->null(),
            'image_url' => $this->string(255)->null(),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

        //        Add Foreign Key lang_id
        $this->addForeignKey(
            '{{%fk-sliders-lang_id}}',
            '{{%sliders}}',
            'lang_id',
            '{{%languages}}',
            'id'
        );

//        Add Index lang_id
        $this->createIndex(
            '{{%idx-sliders-lang_id}}',
            '{{%sliders}}',
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
            '{{%fk-sliders-lang_id}}',
            '{{%sliders}}'
        );
        //Drop Index lang_id
        $this->dropIndex(
            '{{%idx-sliders-lang_id}}',
            '{{%sliders}}'
        );
        $this->dropTable('{{%sliders}}');
    }
}
