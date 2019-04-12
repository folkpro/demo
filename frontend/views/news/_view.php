<?php

use yii\helpers\Html;

?>

<article>
    <h2><?= Html::a($model->name, ['news/view', 'alias' => $model->alias]) ?></h2>
    <p><?= $model->date_publish ?></p>
    <div><?= $model->description ?></div>
</article>
