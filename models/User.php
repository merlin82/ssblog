<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/12
 * Time: 21:08
 */
namespace models;

class User {
    private $client;
    private $db;
    private $collection;

    public function __construct() {
        // 连接到mongodb
        $this->client = new \MongoClient(\Flight::get('mongo.usersdb.host'));
        $this->db = $this->client->selectDB(\Flight::get('mongo.usersdb.name'));
        $this->collection = $this->db->users;
        $this->collection->ensureIndex(array('username'=>1), array('unique'=>true));
    }

    public function auth($username, $password)
    {
        return $this->collection->count(array('username'=>$username, 'password'=>$password)) == 1;
    }
    public function update($username, $old_pwd, $new_pwd)
    {
        return $this->collection->update(array('username'=>$username, 'password'=>$old_pwd),
            array('$set'=>array('password'=>$new_pwd)));
    }
    public function remove($username)
    {
        return $this->collection->remove(array('username'=>$username));
    }
    public function add($username, $password)
    {
        return $this->collection->insert(array('username'=>$username, 'password'=>$password));
    }
}