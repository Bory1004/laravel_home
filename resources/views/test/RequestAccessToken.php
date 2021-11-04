<?php
/*
 * Access Token 요청 예제입니다.
 */
require_once('../autoload.php');
spl_autoload_register('BootpayAutoload');

use Bootpay\Rest\BootpayApi;

$bootpay = BootpayApi::setConfig(
    '617a10a77b5ba4002352d022',
    'F5tSfd4jdutChdnjldxt1wvJYnm62YzhFMfDEOnfy/k='
);

$response = $bootpay->requestAccessToken();

if ($response->status === 200) {
    print $response->data->token . "\n";
    print $response->data->server_time . "\n";
    print $response->data->expired_at . "\n";
} else {
    var_dump($response);
}