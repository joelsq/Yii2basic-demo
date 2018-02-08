<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "websites".
 *
 * @property int $id
 * @property string $name 站点名称
 * @property string $url 地址
 * @property int $alexa 排名
 * @property string $country 国家
 */
class Websites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'websites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'url', 'country'], 'required'],
            [['id', 'alexa'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 52],
            [['id'], 'unique'],
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
            'url' => 'Url',
            'alexa' => 'Alexa',
            'country' => 'Country',
        ];
    }
}
