<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */

// Custom styling for datepicker
$this->registerCss("
    .ui-datepicker {
        background: white;
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        padding: 0.75rem;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        font-size: 0.875rem;
    }
    .ui-datepicker-header {
        background: #2b3440;
        border: none;
        border-radius: 8px;
        color: white;
        padding: 0.5rem;
    }
    .ui-datepicker-calendar th {
        color: #2b3440;
        font-weight: 600;
    }
    .ui-state-default {
        border: none;
        background: #f7f7f7;
        border-radius: 6px;
        text-align: center;
    }
    .ui-state-highlight {
        background: #58cc02;
        color: white;
    }
    .ui-state-active {
        background: #2b3440;
        color: white;
    }
");
?>

<div class="task-form-container">
    <div class="task-form-header">
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>
        <h2 class="header-title"><?= $model->isNewRecord ? 'Create a New Task' : 'Update Your Task' ?></h2>
        <p class="header-subtitle">Fill in the details to level up your productivity!</p>
    </div>

    <div class="task-form-card">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'modern-form'],
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'modern-label'],
                'errorOptions' => ['class' => 'modern-error'],
                'options' => ['class' => 'form-group'],
            ],
        ]); ?>

        <div class="form-section">
            <div class="section-icon">
                <i class="fas fa-tasks"></i>
            </div>
            <?= $form->field($model, 'title')->textInput([
                'maxlength' => true,
                'placeholder' => '✨ Enter an exciting task title',
                'class' => 'modern-input'
            ]) ?>
        </div>

        <div class="form-section">
            <div class="section-icon">
                <i class="fas fa-align-left"></i>
            </div>
            <?= $form->field($model, 'description')->textarea([
                'rows' => 3,
                'placeholder' => '🎯 What are the specific details?',
                'class' => 'modern-textarea'
            ]) ?>
        </div>

        <div class="form-flex">
            <div class="form-section flex-item">
                <div class="section-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <?= $form->field($model, 'due_date')->textInput([
                    'id' => 'datepicker',
                    'class' => 'modern-input',
                    'placeholder' => '📅 Pick a due date',
                    'readonly' => true
                ]) ?>
            </div>

            <div class="form-section flex-item">
                <div class="section-icon">
                    <i class="fas fa-star"></i>
                </div>
                <?= $form->field($model, 'status')->dropDownList([
                    'pending' => '🔵 Pending',
                    'in_progress' => '🟡 In Progress',
                    'completed' => '🟢 Completed',
                ], [
                    'prompt' => 'Select status',
                    'class' => 'modern-select'
                ]) ?>
            </div>
        </div>

        <div class="form-actions">
            <?= Html::submitButton(
                $model->isNewRecord ? 
                '<i class="fas fa-check"></i> Create Task' : 
                '<i class="fas fa-save"></i> Save Changes',
                ['class' => 'btn-submit']
            ) ?>
            <?= Html::a('<i class="fas fa-times"></i> Cancel', ['site/index'], ['class' => 'btn-cancel']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<style>
.task-form-container {
    max-width: 720px;
    margin: 2rem auto;
    padding: 0 1rem;
}

.task-form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.progress-bar {
    height: 12px;
    background: #e5e7eb;
    border-radius: 6px;
    margin-bottom: 1.5rem;
    overflow: hidden;
}

.progress-fill {
    width: 50%;
    height: 100%;
    background: linear-gradient(90deg, #58cc02, #45a302);
    border-radius: 6px;
    transition: width 0.3s ease;
}

.header-title {
    font-size: 2rem;
    font-weight: 800;
    color: #2b3440;
    margin-bottom: 0.5rem;
}

.header-subtitle {
    color: #6b7280;
    font-size: 1.1rem;
}

.task-form-card {
    background: white;
    border-radius: 24px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    padding: 2rem;
}

.form-section {
    position: relative;
    background: #f8f9fa;
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.form-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.section-icon {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: #2b3440;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
}

.form-flex {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.modern-label {
    display: block;
    font-size: 0.925rem;
    font-weight: 700;
    color: #2b3440;
    margin-bottom: 0.75rem;
}

.modern-input,
.modern-textarea,
.modern-select {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    color: #2b3440;
    transition: all 0.2s;
    background-color: white;
}

.modern-input:focus,
.modern-textarea:focus,
.modern-select:focus {
    border-color: #58cc02;
    outline: none;
    box-shadow: 0 0 0 3px rgba(88, 204, 2, 0.1);
}

.modern-textarea {
    resize: vertical;
    min-height: 100px;
}

.modern-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%232b3440' viewBox='0 0 16 16'%3E%3Cpath d='M8 10.5l4-4H4l4 4z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 2.5rem;
}

.modern-error {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.btn-submit,
.btn-cancel {
    padding: 1rem 2rem;
    border-radius: 16px;
    font-size: 1rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s;
    text-decoration: none;
}

.btn-submit {
    background: #58cc02;
    color: white;
    border: 3px solid #46a302;
    flex: 2;
    justify-content: center;
}

.btn-submit:hover {
    background: #46a302;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(70, 163, 2, 0.2);
}

.btn-cancel {
    background: #f8f9fa;
    color: #2b3440;
    border: 3px solid #e5e7eb;
    flex: 1;
    justify-content: center;
}

.btn-cancel:hover {
    background: #e5e7eb;
    transform: translateY(-2px);
}

@media (max-width: 640px) {
    .task-form-card {
        padding: 1.5rem;
    }
    
    .form-flex {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-submit,
    .btn-cancel {
        width: 100%;
    }
    
    .header-title {
        font-size: 1.5rem;
    }
}
</style>

<?php
$this->registerCssFile("https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");
$this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.min.js", ['depends' => \yii\web\JqueryAsset::class]);
$this->registerCssFile("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css");

$script = <<< JS
    $(document).ready(function() {
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        showAnim: 'fadeIn',
        changeMonth: true,
        changeYear: true,
        yearRange: "c-10:c+10",
        beforeShow: function(input, inst) {
            setTimeout(function() {
                inst.dpDiv.css({
                    top: $(input).offset().top + $(input).outerHeight() + 8
                });
            }, 0);
        }
    });

    $("#datepicker").on('keydown', function(e) {
        e.preventDefault(); // Prevent typing in the date field
    });

    function updateProgress() {
        let filledFields = $('.modern-input, .modern-textarea, .modern-select').filter(function() {
            return $.trim($(this).val()) !== ''; // Ensure no empty spaces count
        }).length;
        let totalFields = $('.modern-input, .modern-textarea, .modern-select').length;
        let progress = (totalFields > 0) ? (filledFields / totalFields) * 100 : 0;

        $('.progress-fill').css('width', progress + '%');
    }

    // Run progress update on field changes and when the page loads
    $('.modern-input, .modern-textarea, .modern-select').on('input change', updateProgress);
    updateProgress(); // Ensure progress updates on page load
});

JS;
$this->registerJs($script);
?>