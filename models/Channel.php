<?php

namespace app\models;

use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
 *
 * @property CategoryChannel[] $categoryChannels
 * @property Category[] $categories
 */
class Channel extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
            'slug' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'slugAttribute' => 'slug',
                'ensureUnique' => true,
            ],
        ];
    }

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

    /**
     * @return ActiveQuery
     */
    public function getCategoryChannels()
    {
        return $this->hasMany(CategoryChannel::className(), ['channel_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('{{%category_channel}}', ['channel_id' => 'id']);
    }

    /**
     * @return mixed
     */
    public function getHomeBanner()
    {
        return json_decode($this->banners, true)['bannerTvMediumImageUrl'];
    }

    /**
     * @return ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['channel_id' => 'id']);
    }
}
