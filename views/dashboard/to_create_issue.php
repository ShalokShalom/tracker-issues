<?php

use humhub\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this \humhub\components\View
 * @var $actionUrl string
 */
\tracker\assets\IssueAsset::register($this);
?>
<?php \humhub\widgets\ModalDialog::begin([
    'header' => Html::tag('strong', Yii::t('TrackerIssuesModule.views', 'New issue')),
    'animation' => 'fadeIn'
]) ?>

<div class="modal-body">
    <p>
        <?= Yii::t('TrackerIssuesModule.views', 'Select a space in which the new issue will be added. If nothing is selected, the task will be attached to your profile.'); ?>
    </p>

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'options' => ['class' => 'issue-form'],
    ]); ?>

    <div class="form-group">
        <?= \humhub\modules\space\widgets\SpacePickerField::widget([
            'name' => 'space',
            'formName' => 'space',
            'minInput' => 2,
            'maxSelection' => 1,
        ]); ?>
    </div>

    <?= Html::hiddenInput('u', \Yii::$app->user->identity->guid) ?>

    <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary btn-sm"
                data-ui-loader
                data-action-click="tracker.getCreateForm"
                data-action-url="<?= $actionUrl ?>"
        >
            <?= Yii::t('TrackerIssuesModule.views', 'Add') ?>
        </button>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php \humhub\widgets\ModalDialog::end(); ?>
