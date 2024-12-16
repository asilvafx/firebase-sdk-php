<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db_service.php'); 
 
$db = new DBService(); 

// Example usage
// Get table data
/*
    $tableData = $db->getData('users');
    print_r($tableData);
*/

// Get item data by Search Query
/*
    $queryToFind = 'uid';
    $searchToFind = 'XXXXXXXX';
    $tableToFind = 'users';
    $itemData = $db->getItem($tableToFind, $queryToFind, $searchToFind);
    print_r($itemData);
*/

// Post new user data
/*
    $postData = [
    'avatar' => 'https://example.com/avatar.png',
    'credits' => 100,
    'displayName' => 'New User',
    'email' => 'newuser@example.com',
    'password' => 'hashed_password',
    'status' => '',
    'uid' => 'unique_user_id'
    ];
    $db->postData('users', $postData);
*/

// Get item key by UID
/*
    $queryToFind = 'uid';
    $searchToFind = 'bdd62134-3e25-47a4-859b-b70268504a0d';
    $tableToFind = 'users';

    $userKey = $db->getItemKey($tableToFind, $queryToFind, $searchToFind);
    if ($userKey) {
        echo "DB: $tableToFind | UID: $searchToFind | KEY: $userKey\n";
    } else {
        echo "DB: $tableToFind | UID: $searchToFind | KEY: Not found.\n";
    }
*/

// Update existing user data
/*
    $updateData = [
    'credits' => 150
    ];
    $db->updateData('users' . $userKey, $updateData);
*/

// Delete user data
/*
    $db->deleteData('users' . $userKey);
*/


exit;
