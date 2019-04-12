<?php

use yii\widgets\ListView;

$this->title = 'Список новостей';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{summary}\n{sorter}\n{items}\n{pager}",
                    'itemView' => '_view',
                    'sorter' => [
                        'options' => [
                            'class' => 'sorter'
                        ]
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>
