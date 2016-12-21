<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use usesgraphcrt\faq\models\Faq;
use usesgraphcrt\faq\Module;
use yii\bootstrap\Button;

\usesgraphcrt\faq\assets\FaqAsset::register($this);

$this->title = $model->faq_title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 faq-menu">
                <div class="panel-group" id="accordion">
                    <?php
                    if ($categories) {
                    foreach ($categories as $category) {

                    if ($category->getFaq()->all()) {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $category->id ?>"><?= $category->name ?></a>
                            </h4>
                        </div>
                        <div id="collapse<?= $category->id ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                <?php
                                foreach ($category->getFaq()->all() as $faq) { ?>
                                       <li>
                                           <a class="panel-content" data-role="faq-load"
                                                       data-url="<?= \yii\helpers\Url::to(['faq/ajax-list-view', 'id' => $faq->id]) ?>"><?= $faq->title ?>
                                           </a>
                                       </li>

                                            <?php
                                        }
                                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php }
                    }
                    ?>
                    <?php } else {?>
                        <h4><?= Module::t('faq', 'NO_DATA'); ?></h4>
                    <?php } ?>
                </div>
            </div>
            <div class="faq-view col-md-9" data-role="faq-view">

            </div>
        </div>
    </div>
</div>
