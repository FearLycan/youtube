<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%category_channel}}".
 *
 * @property int $category_id
 * @property int $channel_id
 * @property string $created_at
 *
 * @property Category $category
 * @property Channel $channel
 */
class CategoryChannel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category_channel}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'channel_id'], 'required'],
            [['category_id', 'channel_id'], 'integer'],
            [['created_at'], 'safe'],
            [['category_id', 'channel_id'], 'unique', 'targetAttribute' => ['category_id', 'channel_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['channel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['channel_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'channel_id' => 'Channel ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannel()
    {
        return $this->hasOne(Channel::className(), ['id' => 'channel_id']);
    }
}
