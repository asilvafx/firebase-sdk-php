<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$projectId = 'crypto-fx-d65f4';
$databaseUrl = 'https://crypto-fx-d65f4-default-rtdb.firebaseio.com/';

// Replace with the path to your service account key file
$keyFilePath = 'json/crypto-fx-d65f4-e5462e6c155b.json';

$factory = (new Factory)
    ->withServiceAccount($keyFilePath)
    ->withDatabaseUri($databaseUrl);

$database = $factory->createDatabase();

/**
 * Get data from the database
 *
 * @param string $path The path to the data in the database
 * @return mixed The data retrieved from the database
 */
function getData($database, $path) {
    $reference = $database->getReference($path);
    $snapshot = $reference->getSnapshot();
    return $snapshot->getValue();
}

/**
 * Post new data to the database
 *
 * @param string $path The path to the data in the database
 * @param array $data The data to be posted
 * @return void
 */
function postData($database, $path, $data) {
    $reference = $database->getReference($path);
    $reference->push($data);
}

/**
 * Update existing data in the database
 *
 * @param string $path The path to the data in the database
 * @param array $data The data to be updated
 * @return void
 */
function updateData($database, $path, $data) {
    $reference = $database->getReference($path);
    $reference->update($data);
}

/**
 * Delete data from the database
 *
 * @param string $path The path to the data in the database
 * @return void
 */
function deleteData($database, $path) {
    $reference = $database->getReference($path);
    $reference->remove();
}

/**
 * Get user key by UID
 *
 * @param object $database The database instance
 * @param string $uid The UID of the user
 * @return string|null The user key if found, null otherwise
 */
function getUserKeyByUid($database, $uid) {
$users = getData($database, 'users/');

    if (is_array($users)) {
        foreach ($users as $key => $user) {
            if (isset($user['uid']) && $user['uid'] === $uid) {
                return $key; // Return the user key
            }
        }
    }

    return null; // Return null if UID not found
}
