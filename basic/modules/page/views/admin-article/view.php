<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a(
            'Delete',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data'  => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method'  => 'post',
                ],
            ]
        )?>
    </p>

    <?=DetailView::widget(
        [
            'model'      => $model,
            'attributes' => [
                'id',
                'title',
                'slug',
                'author',
                [
                    'label' => 'Category Title',
                    'value' => $model->category->title ?? 'Not have',
                ],
                [
                    'label' => 'Tag List',
                    'value' => implode(', ', $model->tags),
                ],
                'date_create',
                'date_update',
                'status',
                'content:ntext',
                'short_content:ntext',
                'rating',
                'link',
            ],
        ]
    )?>

</div>
