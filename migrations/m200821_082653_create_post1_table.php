<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post1}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%guest}}`
 */
class m200821_082653_create_post1_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post1}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(55)->notNull(),
            'body' => $this->text(),
            'created_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-post1-created_by}}',
            '{{%post1}}',
            'created_by'
        );

        // add foreign key for table `{{%guest}}`
        $this->addForeignKey(
            '{{%fk-post1-created_by}}',
            '{{%post1}}',
            'created_by',
            '{{%guest}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%guest}}`
        $this->dropForeignKey(
            '{{%fk-post1-created_by}}',
            '{{%post1}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-post1-created_by}}',
            '{{%post1}}'
        );

        $this->dropTable('{{%post1}}');
    }
}
