<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%application}}".
 *
 * @property int $id
 * @property string $link
 * @property string $info
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Application extends ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_READY_TO_DOWNLOAD = 2;
    const STATUS_DELETED = 3;
    const STATUS_DONE = 4;

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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%application}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link', 'status'], 'required'],
            [['info'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['link'], 'string', 'max' => 255],
            [['link'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'info' => 'Info',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getYouTubeID()
    {
        $a = explode('/', $this->link);
        return end($a);
    }
}
