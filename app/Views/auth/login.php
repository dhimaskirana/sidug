<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.login') ?></h1>
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

    <?php if (session('message') !== null) : ?>
        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
    <?php endif ?>

    <form class="user" action="<?= url_to('login') ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <input name="email" type="email" class="form-control form-control-user" value="<?= old('email') ?>" placeholder="<?= lang('Auth.email') ?>" required>
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control form-control-user" placeholder="<?= lang('Auth.password') ?>" required>
        </div>
        <!-- Remember me -->
        <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" name="remember" class="custom-control-input" <?php if (old('remember')) : ?> checked<?php endif ?>>
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
    </form>
    <hr>
    <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
        <p class="text-center small"><?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
    <?php endif ?>

    <?php if (setting('Auth.allowRegistration')) : ?>
        <p class="text-center small"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a></p>
    <?php endif ?>
</div>

<?= $this->endSection(); ?>