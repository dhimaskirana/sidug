<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?= lang('Auth.magicLinkSubject') ?></title>
</head>

<body>
    <strong><a href="<?= url_to('verify-magic-link') ?>?token=<?= $token ?>"><?= lang('Auth.login') ?></a></strong>
    <strong><?= lang('Auth.emailInfo') ?></strong>
    <p><?= lang('Auth.emailIpAddress') ?> <?= esc($ipAddress) ?></p>
    <p><?= lang('Auth.emailDevice') ?> <?= esc($userAgent) ?></p>
    <p><?= lang('Auth.emailDate') ?> <?= esc($date) ?></p>
</body>

</html>