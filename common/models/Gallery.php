<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $file_type Videodur yoxsa sekil
 * @property string $file_url
 * @property int $table_type Xidmetlerimize aiddir yoxsa qalereyaya?
 * @property int $lang_id
 *
 * @property Languages $lang
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_type', 'file_url', 'table_type', 'lang_id'], 'required'],
            [['table_type', 'lang_id'], 'integer'],
            [['file_type', 'file_url'], 'string', 'max' => 255],
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
            'file_type' => 'File Type',
            'file_url' => 'File Url',
            'table_type' => 'Table Type',
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
