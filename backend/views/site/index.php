<?php

/* @var $this yii\web\View */
/* @var $sliders \common\models\Sliders */
/* @var $services \common\models\Services */
/* @var $languages \common\models\Languages */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <!-- Content Row -->
    <div class="row">
        <!-- Sliders -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sliders
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $sliders ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Languages -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Languages
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $languages ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Services
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $services ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
