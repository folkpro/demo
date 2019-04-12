<?php

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список новостей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<article>
    <h1><?= $model->name ?></h1>
    <p><?= $model->date_publish ?></p>
    <div><?= $model->content ?></div>
</article>
