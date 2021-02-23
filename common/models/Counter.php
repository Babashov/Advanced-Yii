<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "counter".
 *
 * @property int $id
 * @property int $count
 * @property string $title
 * @property string $icon_type
 * @property int $lang_id
 *
 * @property Languages $lang
 */
class Counter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'counter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'title', 'icon_type', 'lang_id'], 'required'],
            [['count', 'lang_id'], 'integer'],
            [['title', 'icon_type'], 'string', 'max' => 255],
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
            'count' => 'Count',
            'title' => 'Title',
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
