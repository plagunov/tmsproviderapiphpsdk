<?php
require_once '../vendor/autoload.php';


use ProviderTmsApiSdk\TmsConfig;
use ProviderTmsApiSdk\TmsAccount;
use ProviderTmsApiSdk\TmsException;


$config = TmsConfig::getInstance();
$config->Configure('https://tms.example.com', 'admin_account', 'admin_account_password');

# Example create account
$new_account = new TmsAccount();

$new_account->login = "test_account";
$new_account->fullname = "FullName of test account";

try {
    $account = $new_account->create();
} catch (TmsException $exception) {
    print_r($exception->getMessage());
    $account = null;
}

# Example update account
if ($account != null) {
    print_r($account);
    $account->fullname = "new fullname";

    try {
        $account->update();
    } catch (TmsException $exception) {
        print_r($exception->getMessage());
    }
}

#Example get accounts with paging
try {
    $apiAccount = new TmsAccount();
    list($accounts, $total) = $apiAccount->getList();


    if ($total > count($accounts)) {
        while (true) {
            if ($total == count($accounts)) {
                break;
            }
            list($page_accounts, $_) = $apiAccount->getList(count($accounts), 50, 'id');
            $accounts = array_merge($accounts, $page_accounts);
        }
    }
} catch (TmsException $exception){
    print_r($exception->getMessage());
}

print_r($accounts);
