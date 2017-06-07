# class.truewallet.php

$wallet = new TrueWallet('xxx@gmail.com','yyy');
$token = json_decode($wallet->GetToken(),true)['accessToken'];
$profile = json_decode($wallet->Profile($token),true);