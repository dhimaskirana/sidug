<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.useMagicLink') ?> <?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.useMagicLink') ?></h1>
    </div>

    <div class="alert alert-success text-center">
        <strong><?= lang('Auth.checkYourEmail') ?></strong><br>
        <?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?>
    </div>

</div>

<?= $this->endSection() ?>