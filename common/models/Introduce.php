<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "introduce".
 *
 * @property int $id
 * @property string $title
 * @property string $paragraph
 * @property string $icon_type
 * @property int $lang_id
 *
 * @property Languages $lang
 */
class Introduce extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'introduce';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'paragraph', 'icon_type', 'lang_id'], 'required'],
            [['lang_id'], 'integer'],
            [['title', 'paragraph', 'icon_type'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'paragraph' => 'Paragraph',
            'icon_type' => 'Icon Type',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id']);
    }
}
