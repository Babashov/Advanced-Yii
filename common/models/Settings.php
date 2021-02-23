<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $address
 * @property string $email
 * @property string $telephone
 * @property string $logo
 * @property string $copyright
 * @property string $about_us
 * @property string $subscribe_title
 * @property string $subscribe_paragraph
 * @property string $subscribe_video
 * @property int $lang_id
 *
 * @property Languages $lang
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'email', 'telephone', 'logo', 'copyright', 'about_us', 'subscribe_title', 'subscribe_paragraph', 'subscribe_video', 'lang_id'], 'required'],
            [['lang_id'], 'integer'],
            [['address', 'email', 'telephone', 'logo', 'copyright', 'about_us', 'subscribe_title', 'subscribe_paragraph', 'subscribe_video'], 'string', 'max' => 255],
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
            'address' => 'Address',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'logo' => 'Logo',
            'copyright' => 'Copyright',
            'about_us' => 'About Us',
            'subscribe_title' => 'Subscribe Title',
            'subscribe_paragraph' => 'Subscribe Paragraph',
            'subscribe_video' => 'Subscribe Video',
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
