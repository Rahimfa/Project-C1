<?php

use yii\db\Migration;

class m230201_123456_add_user_id_to_task_table extends Migration
{
    public function up()
    {
        // Add the user_id column to the task table
        $this->addColumn('task', 'user_id', $this->integer()->notNull());

        // Add the foreign key constraint
        $this->addForeignKey(
            'fk-task-user', // Foreign key name
            'task', // Table name
            'user_id', // Column in task table
            'user', // Referenced table
            'id', // Column in user table
            'CASCADE', // Action on delete
            'CASCADE' // Action on update
        );
    }

    public function down()
    {
        // Drop the foreign key constraint
        $this->dropForeignKey('fk-task-user', 'task');

        // Drop the user_id column
        $this->dropColumn('task', 'user_id');
    }
}
