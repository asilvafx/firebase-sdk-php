<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db_service.php'); 
 
$db = new DBService(); 

// EXAMPLES USAGE

// GET table data
/*
    $tableData = $db->getData('users');
    print_r($tableData);
*/

// GET item data by Search Query
/*
    $queryToFind = 'uid';
    $searchToFind = 'XXXXXXXX';
    $tableToFind = 'users';
    $itemData = $db->getItem($tableToFind, $queryToFind, $searchToFind);
    print_r($itemData);
*/

// GET item key by Search Query
/*
    $queryToFind = 'uid';
    $searchToFind = 'bdd62134-3e25-47a4-859b-b70268504a0d';
    $tableToFind = 'users';

    $userKey = $db->getItemKey($tableToFind, $queryToFind, $searchToFind);
    if ($userKey) {
        echo "KEY: $userKey\n";
    } else {
        echo "KEY: Not found.\n";
    }
*/

// POST new data
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

// UPDATE existing data
/*
    $updateData = [
    'credits' => 150
    ];
    $db->updateData('users' . $userKey, $updateData);
*/

// DELETE data
/*
    $db->deleteData('users' . $userKey);
*/


exit;
