<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
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

    <form class="user" action="<?= url_to('register') ?>" method="post">
        <?= csrf_field() ?>

        <!-- Email -->
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
        </div>

        <!-- Username -->
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
        </div>

        <!-- Password (Again) -->
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block mb-4"><?= lang('Auth.register') ?></button>

        <p class="text-center small"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>
    </form>
</div>

<?= $this->endSection(); ?>