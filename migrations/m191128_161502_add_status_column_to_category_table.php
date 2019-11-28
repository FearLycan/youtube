<?php

use yii\db\Migration;

/**
 * Handles adding status to table `category`.
 */
class m191128_161502_add_status_column_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category}}', 'status', $this->smallInteger()->notNull()->defaultValue(1)->after('position'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%category}}', 'status');
    }
}
