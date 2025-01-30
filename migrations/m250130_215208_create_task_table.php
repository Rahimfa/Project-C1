<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m250130_215208_create_task_table extends Migration
{
    public function up()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'status' => "ENUM('pending', 'in_progress', 'completed') NOT NULL DEFAULT 'pending'",
            'due_date' => $this->date(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    public function down()
    {
        $this->dropTable('task');
    }
}
