<?php

use yii\db\Migration;

/**
 * Class m200821_073248_second_migration
 */
class m200821_073248_second_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user2', [
            'id' => $this->primaryKey(),
            'username' => $this->string(55)->notNull()->unique(),
            'email' => $this->string()->notNull(),
            'createdAt'=>$this->integer()
        ]);
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'user_id'=>$this->integer() 
        ]);

        $this->addForeignKey('FK_post_user','post','user_id','user2','id','CASCADE','CASCADE');
        $this->insert('user2',[
            'username'=>'user6',
            'email'=>'user6@xyz.com',
            'createdAt'=>time()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_post_user','post');
        $this->dropTable('post');
        $this->dropTable('user2');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200821_073248_second_migration cannot be reverted.\n";

        return false;
    }
    */
}
