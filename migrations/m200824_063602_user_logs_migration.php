<?php

use yii\db\Migration;

/**
 * Class m200824_063602_user_logs_migration
 */
class m200824_063602_user_logs_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_logs', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string(55)->notNull()->unique(),
            'created_at'=>$this->integer()
        ]);


        $this->insert('user_logs',[
            'id'=>'user1',
            'user_id'=>'user1@xyz.com',
            'created_at'=>time()
        ]);

        $this->insert('user_logs',[
            'id'=>'user2',
            'user_id'=>'user2@xyz.com',
            'created_at'=>time()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200824_063602_user_logs_migration cannot be reverted.\n";

        return false;
    }
    */
}
