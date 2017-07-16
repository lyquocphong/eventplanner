<?php

use app\models\Event;
use app\models\Task;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Task */
/* @var $form ActiveForm */


$events = Event::all();

$event_dropdown = array();

foreach ($events as $event) {
   $event_dropdown[$event->event_id] = $event->name;
}

?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'event_id')->dropDownList($event_dropdown); ?>

    <?= $form->field($model, 'duedate')->textInput() ?>

    <?= $form->field($model, 'reminder')->textInput() ?>

    <?= $form->field($model, 'parent_task_id')->textInput() ?>

    <?= $form->field($model, 'creator_id')->textInput() ?>

    <?= $form->field($model, 'task_status_id')->textInput() ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
