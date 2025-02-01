<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Task $model */

$this->title = 'Update Task: ' . $model->title;

?>
<div class="task-update">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
