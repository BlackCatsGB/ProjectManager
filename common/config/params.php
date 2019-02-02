<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    //внимание. настройки ниже необходимо скорректировать для Вашего сайта
    //настройки avatarURL необходимо настроить в backend/config/params-local.php
    //DEFAULT
    'avatarURL' => 'http://pm/upload/avatar/{id}',
    'avatarPath' => '@frontend/web/upload/avatar/{id}',
    'avatarDefaultPath' => '@frontend/web/images/default.jpg',
    'bsVersion' => '4.x', // this will set globally `bsVersion` to Bootstrap 4.x for all Krajee Extensions
];
