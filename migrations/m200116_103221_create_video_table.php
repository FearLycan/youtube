<?php

use yii\db\Migration;

/**
 * Handles the creation of table `video`.
 */
class m200116_103221_create_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string(),
            'description' => $this->text()->null(),
            'thumbnails' => $this->text()->null(),
            'status' => $this->smallInteger()->defaultValue(1),
            'youtube_id' => $this->string()->notNull(),
            'channel_id' => $this->integer()->notNull(),
            'published_at' => $this->timestamp()->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
        ]);

        $this->addForeignKey('{{%channel_video_id_fk}}', '{{%video}}', 'channel_id', '{{%channel}}', 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('{{%video_created_at_index}}', '{{%video}}', 'created_at');
        $this->createIndex('{{%video_updated_at_index}}', '{{%video}}', 'updated_at');
        $this->createIndex('{{%video_published_at_index}}', '{{%video}}', 'published_at');

        $this->createIndex('{{%video_title_index}}', '{{%video}}', 'title');
        $this->createIndex('{{%video_youtube_id_index}}', '{{%video}}', 'youtube_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%video}}');
    }
}
