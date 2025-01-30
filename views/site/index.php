<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $tasks app\models\Task[] */

$this->title = 'Tasks Board';

// Define status columns based on your actual data
$statuses = ['pending', 'in_progress', 'completed'];

// Group tasks by status
$tasksByStatus = [];
foreach ($statuses as $status) {
    $tasksByStatus[$status] = array_filter($tasks, function($task) use ($status) {
        return $task->status === $status;
    });
}
?>

<div class="task-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="board-container">
        <?php foreach ($statuses as $status): ?>
            <div class="board-column">
                <div class="column-header">
                    <?= Html::encode(ucfirst(str_replace('_', ' ', $status))) ?>
                    <span class="count-badge">
                        <?= count($tasksByStatus[$status]) ?>
                    </span>
                </div>
                
                <div class="task-list">
                    <?php if (!empty($tasksByStatus[$status])): ?>
                        <?php foreach ($tasksByStatus[$status] as $task): ?>
                            <div class="task-card">
                                <div class="task-title">
                                <div class="task-title">
                                    <?= Html::a(
                                        Html::encode($task->title),
                                        ['task/view', 'id' => $task->id],  // Make sure to specify the 'task' controller
                                        ['class' => 'task-link']
                                    ) ?>
                                </div>

                                </div>
                                <?php if ($task->description): ?>
                                    <div class="task-description">
                                        <?= Html::encode(Yii::$app->formatter->asText(substr($task->description, 0, 100))) ?>
                                        <?= strlen($task->description) > 100 ? '...' : '' ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($task->due_date): ?>
                                    <div class="task-due-date">
                                        Due: <?= Yii::$app->formatter->asDate($task->due_date) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-tasks">
                            No tasks in this status
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.board-container {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    overflow-x: auto;
    min-height: 400px;
}

.board-column {
    flex: 1;
    min-width: 300px;
    background: #f5f5f5;
    border-radius: 4px;
    padding: 1rem;
}

.column-header {
    font-size: 1.2em;
    font-weight: bold;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border-bottom: 2px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.count-badge {
    background: #6c757d;
    color: white;
    padding: 0.2rem 0.6rem;
    border-radius: 12px;
    font-size: 0.8em;
}

.task-card {
    background: white;
    border-radius: 4px;
    padding: 1rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.task-title {
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.task-description {
    font-size: 0.9em;
    color: #666;
    margin: 0.5rem 0;
}

.task-due-date {
    font-size: 0.85em;
    color: #666;
    margin-top: 0.5rem;
}

.task-link {
    color: #333;
    text-decoration: none;
}

.task-link:hover {
    color: #0056b3;
    text-decoration: none;
}

.no-tasks {
    color: #666;
    text-align: center;
    padding: 1rem;
    font-style: italic;
}
</style>