<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Witaj <?= $user->username ?>,

Skorzystaj z poniższego linka żeby zresetować hasło:

<?= $resetLink ?>
