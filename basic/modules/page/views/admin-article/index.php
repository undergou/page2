<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Article', ['create'], ['class' => 'btn btn-success'])?>
    </p>


    <?=GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                'slug',
                'author',
                //'category',
                //'date_create',
                //'date_update',
                //'status',
                //'content:ntext',
                //'short_content:ntext',
                //'rating',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]
    );?>


</div>
