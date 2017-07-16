<?php

use app\models\EventSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $searchModel EventSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'All Events');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
        <?php
        $events = $dataProvider->getModels();

        foreach ($events as $event) {
            ?>
        <a href="<?php echo $url = Url::to(['event/view', 'id' => $event->event_id]);?>"><div class="col-md-4">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title" style=" white-space: nowrap; 
                            width: 100%; 
                            overflow: hidden;
                            text-overflow: ellipsis;"><?php echo $event->name ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div style="min-height: 200px;max-height: 200px;word-wrap: break-word;overflow: hidden"><?php echo $event->description ?></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div></a>
            <?php
        }
        ?>
    </div>


