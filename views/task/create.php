<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Task $model */

$this->title = 'Create Task';

?>
<div class="task-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
