<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'options' => ['width' => '70']
            ],
            'name',
            'alias',
            'date_publish',
            [
                'attribute' => 'is_active',
                'content' => function($data){
                    return Yii::$app->params['status'][$data->is_active];
                },
                'filter' => Yii::$app->params['status'],
                'options' => ['width' => '180']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '70'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '/news/'.$model->alias, ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0', 'target' => '_blank']);
                   }
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
