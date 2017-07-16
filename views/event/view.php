<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
?>
<div class="event-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->event_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Create task'), ['task/create', 'event_id' => $model->event_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->event_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>        
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'event_id',
            'event_date',
            //'creator_id',
            [
                'attribute' => 'reminder',
                'label' => 'Reminder',
                'format' => 'raw',
                'value' => $model->reminder ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>'
            ],
            'description:html',
        //'event_status_id',
        //'name',
        ],
    ]);

//    DetailView::widget([
//        'model' => $model,
//        'condensed' => true,
//        'bordered' => true,
//        'hover' => true,
//        'mode' => DetailView::MODE_VIEW,
//        'responsive' => true,
//        'panel' => [
//            'heading' => 'Book # ' . $model->event_id,
//            'type' => DetailView::TYPE_INFO,
//        ],
//        'attributes' => [
//            [
//                'attribute' => 'name',
//                'format' => 'text',
//                'label' => 'Event name'
//            ],
//            'event_date',
//            [
//                'attribute' => 'description',
//                'format' => 'html',
//                'value' => '<span class="text-justify">' . $model->description . '</span>',
//                'type' => DetailView::INPUT_TEXTAREA,
//                'options' => ['rows' => 4]
//            ],
//            [
//                'attribute' => 'reminder',
//                'label' => 'Reminder',
//                'format' => 'raw',
//                'value' => $model->reminder ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>'
//            ]
//        ]
//    ]);
    ?>   

    <?php
    $tasks = $model->tasks;
   
    if (count($tasks) > 0) {
        echo '<hr style="border: 1px solid #ccc;">';

        echo '<table style="width:100%;margin-top:10px">';

        foreach ($tasks as $task) {             
            echo '<div class="box box-solid box-success">
            <div class="box-header with-border">
                <h3 class="box-title">'.$task->name.'</h3>
                <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="word-wrap: break-word;">
                '.$task->description.'
            </div><!-- /.box-body -->            
        </div><!-- /.box -->';
        }

        echo '</table>';
    }
    ?>
</div>
