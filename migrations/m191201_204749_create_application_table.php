<?php

use yii\db\Migration;

/**
 * Handles the creation of table `application`.
 */
class m191201_204749_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'link' => $this->string()->notNull()->unique(),
            'info' => $this->text()->null(),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
        ]);

        $this->createIndex('{{%application_created_at_index}}', '{{%application}}', 'created_at');
        $this->createIndex('{{%application_updated_at_index}}', '{{%application}}', 'updated_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%application}}');
    }
}
