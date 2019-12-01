<?php

use yii\db\Migration;

/**
 * Handles the creation of table `channel`.
 */
class m191128_212207_create_channel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%channel}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'youtube_id' => $this->string()->notNull(),
            'description' => $this->text()->null(),
            'thumbnails' => $this->text()->null(),
            'banners' => $this->text()->null(),
            'viewCount' => $this->bigInteger()->null(),
            'subscriberCount' => $this->bigInteger()->null(),
            'videoCount' => $this->bigInteger()->null(),
            'status' => $this->smallInteger()->defaultValue(1),
            'last_activity' => $this->timestamp()->null(),
            'synchronized_at' => $this->timestamp()->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
        ]);

        $this->createIndex('{{%channel_created_at_index}}', '{{%channel}}', 'created_at');
        $this->createIndex('{{%channel_updated_at_index}}', '{{%channel}}', 'updated_at');
        $this->createIndex('{{%channel_last_activity_index}}', '{{%channel}}', 'last_activity');
        $this->createIndex('{{%channel_synchronized_at_index}}', '{{%channel}}', 'synchronized_at');
        $this->createIndex('{{%channel_name_index}}', '{{%channel}}', 'title');
        $this->createIndex('{{%channel_slug_index}}', '{{%channel}}', 'slug');
        $this->createIndex('{{%channel_youtube_id_index}}', '{{%channel}}', 'youtube_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%channel}}');
    }
}
