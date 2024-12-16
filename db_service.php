<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Exception\DatabaseException;
use Kreait\Firebase\Factory;

class DbService {

    private $database;

    function __construct() {
        $databaseUrl = 'https://crypto-fx-d65f4-default-rtdb.firebaseio.com/';
        $keyFilePath = 'json/crypto-fx-d65f4-e5462e6c155b.json';
        $factory = (new Factory)
            ->withServiceAccount($keyFilePath)
            ->withDatabaseUri($databaseUrl);

        $this->database = $factory->createDatabase();
    }

    /**
     * Get data from the database
     *
     * @param string $path The path to the data in the database
     * @return mixed The data retrieved from the database
     * @throws DatabaseException
     */
    function getData($path) {
        $path =  $path.'/';
        $reference = $this->database->getReference($path);
        $snapshot = $reference->getSnapshot();
        return $snapshot->getValue();
    }

    /**
     * Post new data to the database
     *
     * @param string $path The path to the data in the database
     * @param array $data The data to be posted
     * @return void
     * @throws DatabaseException
     */
    function postData($path, $data=null) {
        $path =  $path.'/';
        $reference = $this->database->getReference($path);
        $reference->push($data);
    }

    /**
     * Update existing data in the database
     *
     * @param string $path The path to the data in the database
     * @param array $data The data to be updated
     * @return void
     * @throws DatabaseException
     */
    function updateData($path, $data=null) {
        $path =  $path.'/';
        $reference = $this->database->getReference($path);
        $reference->update($data);
    }

    /**
     * Delete data from the database
     *
     * @param string $path The path to the data in the database
     * @return void
     * @throws DatabaseException
     */
    function deleteData($path) {
        $path =  $path.'/';
        $reference = $this->database->getReference($path);
        $reference->remove();
    }

    /**
     * Get key by Search Query
     *
     * @param $table
     * @param $query
     * @param $search
     * @return string|null The data key if found, null otherwise
     * @throws DatabaseException
     */
    function getKeyByQuery($table, $query, $search) {
        $data = $this->getData($table);

        if (is_array($data)) {
            foreach ($data as $key => $item) {
                if (isset($item[$query]) && $item[$query] === $search) {
                    return $key; // Return the data key
                }
            }
        }
        return null; // Return null if Query not found
    }

    /**
     * Get Item Data by Search Query
     *
     * @param $table
     * @param $query
     * @param $search
     * @return string|null The data key if found, null otherwise
     * @throws DatabaseException
     */
    function getItem($table, $query, $search) {
        $data = $this->getData($table);

        if (is_array($data)) {
            foreach ($data as $key => $item) {
                if (isset($item[$query]) && $item[$query] === $search) {
                    return $item; // Return the data
                }
            }
        }
        return null; // Return null if Query not found
    }

}
