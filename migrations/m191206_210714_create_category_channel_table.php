<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category_channel`.
 */
class m191206_210714_create_category_channel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_channel}}', [
            'category_id' => $this->integer(),
            'channel_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addPrimaryKey('{{%category_channel_pk}}', '{{%category_channel}}', ['category_id', 'channel_id']);
        $this->addForeignKey('{{%category_id_fk}}', '{{%category_channel}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('{{%channel_id_fk}}', '{{%category_channel}}', 'channel_id', '{{%channel}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_channel}}');
    }
}
