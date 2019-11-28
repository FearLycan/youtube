<?php

use app\models\Category;
use yii\db\Migration;

/**
 * Class m191128_202440_add_relation_to_parent_id_in_category_table
 */
class m191128_202440_add_relation_to_parent_id_in_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%category}}', 'parent_id');

        $this->addColumn('{{%category}}', 'parent_id', $this->integer()->null()->after('description'));

        $this->insert('{{%category}}', [
            'id' => Category::MAIN_PARENT,
            'name' => 'Main Category',
            'slug' => 'main-category',
            'parent_id' => null,
        ]);

        $this->addForeignKey('{{%category_parent_id_fk}}', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%category_parent_id_fk}}', '{{%category}}');

        $this->dropColumn('{{%category}}', 'parent_id');

        $this->addColumn('{{%category}}', 'parent_id', $this->integer()->defaultValue(0)->after('description'));
    }
}
