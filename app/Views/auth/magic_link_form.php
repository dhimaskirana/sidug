<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.useMagicLink') ?> <?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.useMagicLink') ?></h1>
    </div>

    <?php if (session('error') !== null) : ?>
        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
    <?php elseif (session('errors') !== null) : ?>
        <div class="alert alert-danger" role="alert">
            <?php if (is_array(session('errors'))) : ?>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                    <br>
                <?php endforeach ?>
            <?php else : ?>
                <?= session('errors') ?>
            <?php endif ?>
        </div>
    <?php endif ?>

    <form class="user" action="<?= url_to('magic-link') ?>" method="post">
        <?= csrf_field() ?>

        <!-- Email -->
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="floatingEmailInput" name="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email', auth()->user()->email ?? null) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block mb-4"><?= lang('Auth.send') ?></button>

    </form>

    <p class="text-center small"><a href="<?= url_to('login') ?>"><?= lang('Auth.backToLogin') ?></a></p>

</div>

<?= $this->endSection(); ?>