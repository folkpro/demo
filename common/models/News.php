<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name Название
 * @property string $alias Алиас
 * @property string $description Описание
 * @property string $content Контент
 * @property string $public_date Дата
 * @property int $is_active Активность
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'alias', 'date_publish'], 'required'],
            [['description', 'content'], 'string'],
            [['date_publish'], 'safe'],
            [['is_active'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 255],
            [['name', 'alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'alias' => 'Алиас',
            'description' => 'Описание',
            'content' => 'Контент',
            'date_publish' => 'Дата',
            'is_active' => 'Активность',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        $this->date_publish = date('Y-m-d', strtotime($this->date_publish));

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function afterFind()
    {
        parent::afterFind();

        $this->date_publish = date('d.m.Y', strtotime($this->date_publish));
    }

    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
