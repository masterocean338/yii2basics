<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guest}}`.
 */
class m200821_081507_create_guest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%guest}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(55)->notNull()->unique(),
            'email' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%guest}}');
    }
}
