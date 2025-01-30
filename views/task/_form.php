<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        'pending' => 'Pending',
        'in_progress' => 'In progress',
        'completed' => 'Completed',
    ], ['prompt' => '']) ?>

    <?= $form->field($model, 'due_date')->textInput(['id' => 'datepicker']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
// Include the jQuery UI CSS and JS files
$this->registerCssFile("https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");
$this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.min.js", ['depends' => \yii\web\JqueryAsset::class]);

// Initialize the Datepicker after jQuery and jQuery UI are loaded
$script = <<< JS
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd'  // Adjust format if needed
        });
    });
JS;
$this->registerJs($script);
?>
