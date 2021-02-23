<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SlidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Slider', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id',
                    'contentOptions' => [
                        'style' => 'width: 60px'
                    ]
                ],
                [
                    'label' => 'Image',
                    'attribute' => 'image_url',
                    'content' => function ($model) {
                        /** @var \common\models\Sliders $model */
                        return Html::img($model->getImageUrl(), ['style' => 'width: 50px']);
                    }
                ],
                [
                    'attribute' => 'title',
                    'content' => function ($model) {
                        return \yii\helpers\StringHelper::truncateWords($model->title, 7);
                    }
                ],

                [
                    'class' => 'common\grid\ActionColumn',
                    'contentOptions' => [
                        'class' => 'td-actions'
                    ]
                ],
            ],
        ]); ?>
    </div>


</div>