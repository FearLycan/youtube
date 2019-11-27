<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m191126_211746_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'image' => $this->text()->null(),
            'description' => $this->string()->null(),
            'parent_id' => $this->integer()->defaultValue(0),
            'position' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
        ]);

        $this->createIndex('{{%category_created_at_index}}', '{{%category}}', 'created_at');
        $this->createIndex('{{%category_updated_at_index}}', '{{%category}}', 'updated_at');
        $this->createIndex('{{%category_name_index}}', '{{%category}}', 'name');
        $this->createIndex('{{%category_slug_index}}', '{{%category}}', 'slug');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
