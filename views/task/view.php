<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Task $model */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
// Register CSS for modern styling
$this->registerCss("
    .task-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
    }
    .task-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        overflow: hidden;
    }
    .task-header {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        color: white;
        padding: 2rem;
        position: relative;
    }
    .task-title {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        padding-right: 100px;
    }
    .task-status-badge {
        position: absolute;
        top: 2rem;
        right: 2rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(8px);
    }
    .task-content {
        padding: 2rem;
    }
    .task-section {
        margin-bottom: 2rem;
    }
    .task-section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #4b5563;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .task-description {
        background: #f9fafb;
        border-radius: 16px;
        padding: 1.5rem;
        color: #4b5563;
        line-height: 1.6;
        font-size: 1.1rem;
    }
    .task-meta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .meta-item {
        background: #f9fafb;
        border-radius: 16px;
        padding: 1rem;
    }
    .meta-label {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .meta-value {
        font-weight: 600;
        color: #111827;
    }
    .task-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }
    .btn-modern {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }
    .btn-primary-modern {
        background: #6366f1;
        color: white;
        border: none;
    }
    .btn-primary-modern:hover {
        background: #4f46e5;
        transform: translateY(-2px);
    }
    .btn-danger-modern {
        background: #ef4444;
        color: white;
        border: none;
    }
    .btn-danger-modern:hover {
        background: #dc2626;
        transform: translateY(-2px);
    }
");
?>

<div class="task-container">
    <div class="task-card">
        <!-- Task Header with Status -->
        <div class="task-header">
            <h1 class="task-title"><?= Html::encode($model->title) ?></h1>
            <div class="task-status-badge">
                <?php
                $statusIcon = '';
                switch(strtolower($model->status)) {
                    case 'pending':
                        $statusIcon = 'fa fa-hourglass-start';
                        break;
                    case 'in_progress':
                        $statusIcon = 'fa fa-running';
                        break;
                    case 'completed':
                        $statusIcon = 'fa fa-check-circle';
                        break;
                }
                ?>
                <i class="<?= $statusIcon ?>"></i>
                <?= Html::encode($model->status) ?>
            </div>
        </div>

        <!-- Task Content -->
        <div class="task-content">
            <!-- Description Section -->
            <div class="task-section">
                <h2 class="task-section-title">
                    <i class="fa fa-align-left"></i> Description
                </h2>
                <div class="task-description">
                    <?= Html::encode($model->description) ?>
                </div>
            </div>

            <!-- Meta Information Grid -->
            <div class="task-meta-grid">
                <div class="meta-item">
                    <div class="meta-label">
                        <i class="fa fa-calendar"></i> Due Date
                    </div>
                    <div class="meta-value">
                        <?= Yii::$app->formatter->asDate($model->due_date, 'php:F j, Y') ?>
                    </div>
                </div>

                <div class="meta-item">
                    <div class="meta-label">
                        <i class="fa fa-clock"></i> Created
                    </div>
                    <div class="meta-value">
                        <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?>
                    </div>
                </div>

                <div class="meta-item">
                    <div class="meta-label">
                        <i class="fa fa-history"></i> Last Updated
                    </div>
                    <div class="meta-value">
                        <?= Yii::$app->formatter->asRelativeTime($model->updated_at) ?>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="task-actions">
                <?= Html::a(
                    '<i class="fa fa-edit"></i> Edit Task',
                    ['update', 'id' => $model->id],
                    ['class' => 'btn btn-modern btn-primary-modern']
                ) ?>
                <?= Html::a(
                    '<i class="fa fa-trash"></i> Delete',
                    ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-modern btn-danger-modern',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this task?',
                            'method' => 'post',
                        ],
                    ]
                ) ?>
            </div>
        </div>
    </div>
</div>