<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%channel}}".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $youtube_id
 * @property string $description
 * @property string $thumbnails
 * @property string $banners
 * @property int $viewCount
 * @property int $subscriberCount
 * @property int $videoCount
 * @property int $status
 * @property string $last_activity
 * @property string $synchronized_at
 * @property string $created_at
 * @property string $updated_at
 */
class Channel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%channel}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'youtube_id'], 'required'],
            [['description', 'thumbnails', 'banners'], 'string'],
            [['viewCount', 'subscriberCount', 'videoCount', 'status'], 'integer'],
            [['last_activity', 'synchronized_at', 'created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'youtube_id'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
            'youtube_id' => 'Youtube ID',
            'description' => 'Description',
            'thumbnails' => 'Thumbnails',
            'banners' => 'Banners',
            'viewCount' => 'View Count',
            'subscriberCount' => 'Subscriber Count',
            'videoCount' => 'Video Count',
            'status' => 'Status',
            'last_activity' => 'Last Activity',
            'synchronized_at' => 'Synchronized At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
