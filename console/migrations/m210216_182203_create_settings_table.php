<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%settings}}`.
 */
class m210216_182203_create_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%settings}}', [
            'id' => $this->primaryKey()->unsigned(),
            'address' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'telephone' => $this->string(255)->notNull(),
            'logo' => $this->string(255)->null(),
            'copyright' => $this->string(255)->null(),
            'about_us' => 'LONGTEXT',
            'subscribe_title' => $this->string(255)->null(),
            'subscribe_paragraph' => 'LONGTEXT',
            'subscribe_video' => $this->string(255)->null(),
            'lang_id' => $this->integer(11)->unsigned()
        ]);

//        Add Foreign Key lang_id
        $this->addForeignKey(
            '{{%fk-settings-lang_id}}',
            '{{%settings}}',
            'lang_id',
            '{{%languages}}',
            'id'
        );

//        Add Index lang_id
        $this->createIndex(
            '{{%idx-settings-lang_id}}',
            '{{%settings}}',
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
            '{{%fk-settings-lang_id}}',
            '{{%settings}}'
        );
//        Drop Index lang_id
        $this->dropIndex(
            '{{%idx-settings-lang_id}}',
            '{{%settings}}'
        );
        $this->dropTable('{{%settings}}');
    }
}
