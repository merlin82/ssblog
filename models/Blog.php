<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/12
 * Time: 21:08
 */
namespace models;

class Blog {
    private $client;
    private $db;
    private $collection;

    public function __construct() {
        // 连接到mongodb
        $this->client = new \MongoClient(\Flight::get('mongo.blogsdb.host'));
        $this->db = $this->client->selectDB(\Flight::get('mongo.blogsdb.name'));
        $this->collection = $this->db->blogs;
        $this->collection->ensureIndex(array('datetime'=>-1));
        $this->collection->ensureIndex(array('class'=>-1));
    }

    public function insert($blog)
    {
        return $this->collection->insert($blog);
    }
    public function update($id, $blog)
    {
        return $this->collection->update(array('_id'=>new \MongoId($id)), array('$set' => $blog));
    }
    public function remove($id)
    {
        return $this->collection->remove(array('_id'=>new \MongoId($id)));
    }
    public function find($id)
    {
        return $this->collection->find(array('_id'=>new \MongoId($id)));
    }
    public function findList($start, $num)
    {
        return $this->collection->find(array(),
            array('_id'=>true,
                'title'=>true,
                'datetime'=>true,
                'type'=>true,
                'abstract'=>true))
            ->sort(array('datetime'=>-1))->limit($num)->skip($start);
    }
    public function findbyDate($start_date, $end_date)
    {

    }

    public function findbyClass($class)
    {

    }
}
