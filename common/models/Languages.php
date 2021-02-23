<?php


namespace common\models;

use app\models\AboutUs;
use app\models\Counter;
use app\models\Gallery;
use app\models\Introduce;
use app\models\Services;
use app\models\Settings;
use app\models\Socials;
use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property AboutUs[] $about-us
 * @property Counter[] $counters
 * @property Gallery[] $galleries
 * @property Introduce[] $introduces
 * @property Services[] $services
 * @property Settings[] $settings
 * @property Sliders[] $sliders
 * @property Socials[] $socials
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
        ];
    }

    /**
     * Gets query for [[About-us]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAboutUs()
    {
        return $this->hasMany(AboutUs::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Counters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCounters()
    {
        return $this->hasMany(Counter::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Galleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Introduces]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntroduces()
    {
        return $this->hasMany(Introduce::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Settings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(Settings::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Sliders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSliders()
    {
        return $this->hasMany(Sliders::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Socials]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSocials()
    {
        return $this->hasMany(Socials::className(), ['lang_id' => 'id']);
    }
}
