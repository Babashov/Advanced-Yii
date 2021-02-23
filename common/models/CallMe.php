<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "call_me".
 *
 * @property int $id
 * @property string $full_name
 * @property string $telephone
 * @property string $description
 */
class CallMe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'call_me';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'telephone', 'description'], 'required'],
            [['full_name', 'telephone', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'telephone' => 'Telephone',
            'description' => 'Description',
        ];
    }
}
