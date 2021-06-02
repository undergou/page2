<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\Article */
/* @var $categories */
/* @var $tags */

$this->title = 'Update Article: '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render(
        '_form',
        [
            'model'      => $model,
            'categories' => $categories,
            'tags'       => $tags,
        ]
    )?>

</div>
