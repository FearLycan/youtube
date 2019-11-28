<?php

namespace app\models;

use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property int $parent_id
 * @property int $position
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Category $parent
 * @property Category[] $children
 */
class Category extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;


    const MAIN_PARENT = 0;

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
                'attribute' => 'name',
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
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'status'], 'required'],
            [['parent_id', 'position', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'description'], 'string', 'max' => 255],
            [['image'], 'string'],
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
            'slug' => 'Slug',
            'image' => 'Image',
            'description' => 'Description',
            'parent_id' => 'Parent ID',
            'position' => 'Position',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Category::class, ['parent_id' => 'id']);
    }
}
