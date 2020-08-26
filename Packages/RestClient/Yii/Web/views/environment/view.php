<?php

use PhpLab\Core\Libs\I18Next\Facades\I18Next;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \Packages\User\Domain\Entities\EnvironmentEntity $environmentEntity
 * @var \Packages\RestClient\Domain\Entities\ProjectEntity[] | \Illuminate\Support\Collection $projectCollection
 * @var \Packages\RestClient\Domain\Entities\ProjectEntity[] | \Illuminate\Support\Collection $hasProjectCollection
 */

$this->title = $environmentEntity->getTitle();

?>

<div class="col-lg-12">
    <div class="pull-right">
        <a href="<?= Url::to(['/rest-client/environment/update', 'id' => $environmentEntity->getId()]) ?>"
           class="btn btn-primary"><?= I18Next::t('core', 'action.update') ?></a>
    </div>
    <h2>
        <?= $this->title ?>
    </h2>
</div>
