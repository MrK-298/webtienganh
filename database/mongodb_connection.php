<?php
function connectToMongoDB($database,$collection) {
    require_once(dirname(__DIR__) . '/vendor/autoload.php');
    try {
        $mongoClient = new MongoDB\Client('mongodb+srv://khoinguyen29082002:khoibia123@hoangkhoi.9ehzu5m.mongodb.net/');
        $Database = $mongoClient->selectDatabase($database);
        $collection = $Database->selectCollection($collection);
        return $collection;
    } catch (MongoDB\Driver\Exception\ConnectionException $e) {
        echo "Không thể kết nối tới MongoDB: " . $e->getMessage();
    }
}
?>
