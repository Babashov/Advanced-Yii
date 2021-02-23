<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Languages */

$this->title = 'Create About Us';
$this->params['breadcrumbs'][] = ['label' => 'About Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
