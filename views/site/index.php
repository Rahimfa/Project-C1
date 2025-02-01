<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

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
// Keep your original JS (drag and drop functionality)
$updateTaskUrl = Url::to(['task/update-status']);
$this->registerJs("
    function handleDragStart(e) {
        e.target.classList.add('dragging');
        e.dataTransfer.setData('text/plain', e.target.dataset.taskId);
    }

    function handleDragEnd(e) {
        e.target.classList.remove('dragging');
    }

    function handleDragOver(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
    }

    function handleDrop(e) {
        e.preventDefault();
        const taskId = e.dataTransfer.getData('text/plain');
        const newStatus = e.currentTarget.dataset.status;
        
        const loadingOverlay = document.createElement('div');
        loadingOverlay.className = 'loading-overlay';
        loadingOverlay.innerHTML = '<div class=\"spinner\"></div>';
        document.body.appendChild(loadingOverlay);

        fetch('$updateTaskUrl', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': '" . Yii::$app->request->csrfToken . "',
                'X-Requested-With': 'XMLHttpRequest',
                'Referrer-Policy': 'strict-origin-when-cross-origin'
            },
            credentials: 'same-origin',
            mode: 'same-origin',
            body: JSON.stringify({
                taskId: taskId,
                status: newStatus
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                 window.location.reload();
            } else {
                throw new Error(data.message || 'Failed to update task status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the task: ' + error.message);
        })
        .finally(() => {
            document.body.removeChild(loadingOverlay);
        });
    }

    document.querySelectorAll('.task-card').forEach(card => {
        card.setAttribute('draggable', true);
        card.addEventListener('dragstart', handleDragStart);
        card.addEventListener('dragend', handleDragEnd);
    });

    document.querySelectorAll('.task-list').forEach(list => {
        list.addEventListener('dragover', handleDragOver);
        list.addEventListener('drop', handleDrop);
    });
", View::POS_END);
?>

<div class="task-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Html::a('<i class="fa fa-plus"></i> Create Task', ['task/create'], ['class' => 'btn-create']) ?>
    </div>

    <div class="board-container">
        <?php foreach ($statuses as $status): ?>
            <div class="board-column">
                <div class="column-header">
                    <?php
                    $icon = '';
                    $headerClass = '';
                    switch($status) {
                        case 'pending':
                            $icon = 'fa-hourglass-start';
                            $headerClass = 'pending-header';
                            break;
                        case 'in_progress':
                            $icon = 'fa-running';
                            $headerClass = 'progress-header';
                            break;
                        case 'completed':
                            $icon = 'fa-check-circle';
                            $headerClass = 'completed-header';
                            break;
                    }
                    ?>
                    <div class="header-content <?= $headerClass ?>">
                        <span class="header-title">
                            <i class="fa <?= $icon ?>"></i>
                            <?= Html::encode(ucfirst(str_replace('_', ' ', $status))) ?>
                        </span>
                        <span class="count-badge">
                            <?= count($tasksByStatus[$status]) ?>
                        </span>
                    </div>
                </div>
                
                <div class="task-list" data-status="<?= Html::encode($status) ?>">
                    <?php if (!empty($tasksByStatus[$status])): ?>
                        <?php foreach ($tasksByStatus[$status] as $task): ?>
                            <div class="task-card" data-task-id="<?= $task->id ?>">
                                <div class="task-title">
                                    <?= Html::a(
                                        Html::encode($task->title),
                                        ['task/view', 'id' => $task->id],
                                        ['class' => 'task-link']
                                    ) ?>
                                </div>
                                <?php if ($task->description): ?>
                                    <div class="task-description">
                                        <?= Yii::$app->formatter->asRaw(substr($task->description, 0, 100)) ?>
                                        <?= strlen($task->description) > 100 ? '...' : '' ?>
                                    </div>

                                <?php endif; ?>
                                <?php if ($task->due_date): ?>
                                    <div class="task-due-date">
                                        <i class="fa fa-calendar"></i>
                                        <?= Yii::$app->formatter->asDate($task->due_date) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-tasks">
                            <i class="fa fa-inbox"></i>
                            <p>No tasks yet</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
/* Modern styling */
body {
    background: #f0f2f5;
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.task-index {
    padding: 2rem;
    max-width: 1400px;
    margin: 0 auto;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.page-header h1 {
    font-size: 2rem;
    font-weight: 700;
    color: #1a1a1a;
    margin: 0;
}

.btn-create {
    background: #6366f1;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s;
    border: none;
}

.btn-create:hover {
    background: #4f46e5;
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

.board-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    padding: 0.5rem;
    min-height: 400px;
}

.board-column {
    background: #ffffff;
    border-radius: 24px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
}

.column-header {
    margin-bottom: 1.5rem;
}

.header-content {
    padding: 1rem;
    border-radius: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: white;
}

.pending-header {
    background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
}

.progress-header {
    background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
}

.completed-header {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.count-badge {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
    backdrop-filter: blur(8px);
}

.task-list {
    flex-grow: 1;
    min-height: 200px;
    padding: 0.5rem;
}

.task-card {
    background: white;
    border-radius: 16px;
    padding: 1.25rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    border: 1px solid #f0f0f0;
    cursor: move;
    transition: all 0.2s ease;
}

.task-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.task-card.dragging {
    opacity: 0.5;
    transform: scale(0.95);
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}

.task-title {
    font-weight: 600;
    margin-bottom: 0.75rem;
    color: #1a1a1a;
}

.task-link {
    color: #1a1a1a;
    text-decoration: none;
}

.task-link:hover {
    color: #6366f1;
    text-decoration: none;
}

.task-description {
    font-size: 0.925rem;
    color: #4b5563;
    margin: 0.75rem 0;
    line-height: 1.5;
}

.task-due-date {
    font-size: 0.875rem;
    color: #6b7280;
    margin-top: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.no-tasks {
    text-align: center;
    padding: 2rem;
    color: #9ca3af;
    font-size: 0.925rem;
    background: #f9fafb;
    border-radius: 16px;
    border: 2px dashed #e5e7eb;
}

.no-tasks i {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.no-tasks p {
    margin: 0;
}

.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(4px);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #6366f1;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .task-index {
        padding: 1rem;
    }
    
    .board-container {
        grid-template-columns: 1fr;
    }
    
    .board-column {
        min-height: auto;
    }
}
</style>