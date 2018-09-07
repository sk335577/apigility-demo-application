<?php

namespace ComicsApi\V1\Rest\Characters;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\AdapterAbstractServiceFactory;
use Zend\Paginator\Adapter\DbSelect;
use ComicsApi\V1\Rest\Characters\CharactersCollection;
use ComicsApi\V1\Rest\Characters\CharactersEntity;
use Zend\Db\ResultSet\HydratingResultSet;
use ZendDbSqlTableIdentifier;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\ResultSet\ResultSet;

class CharactersMapper {

    protected $database_adapter;

    public function __construct(AdapterInterface $database_adapter) {
        $this->database_adapter = $database_adapter;
    }

    public function fetchAll($columns = [], $filters = []) {

        $select = new Select('sktd_characters');

        if (!empty($columns)) {
            $select->columns($columns);
        }

        if (!empty($filters)) {
            $select->where($filters);
        }

        $resultset = new HydratingResultSet;
        $resultset->setObjectPrototype(new CharactersEntity);
//        $paginatorAdapter = new DbSelect($select, $this->database_adapter);//Will work also
        $paginatorAdapter = new DbSelect($select, $this->database_adapter, $resultset);
        $collection = new CharactersCollection($paginatorAdapter);
        return $collection;
    }

    public function fetchById($character_Id) {
        $sql = 'SELECT * FROM sktd_characters WHERE id = ?';
        $resultset = $this->database_adapter->query($sql, array($character_Id));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }
        $entity = new CharactersEntity();
        $entity->exchangeArray($data[0]);
        return $entity;
    }

    public function fetchOne($id, $columns = [], $secondary_filters = []) {

        $sql = new Sql($this->database_adapter);

        $select = $sql->select('sktd_characters');

        if (!empty($columns)) {
            $select->columns($columns);
        }

        if ($id) {
            $select->where(['id' => $id]);
        }

        if (!empty($secondary_filters)) {
            $select->where($secondary_filters);
        }

        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        if ($result->count() == 1) {
            $resultSet = new ResultSet();
            $resultSet->initialize($result);
            $entity = new CharactersEntity();
            $entity->exchangeArray($resultSet->toArray()[0]);
            return $entity;
        } else {
            return [];
        }
    }

    public function save($data, $id = 0) {
        $data = (array) $data;
        $parameters = [
            $data['username'],
            $data['email'],
            $data['first_name'],
            $data['last_name'],
        ];
        if ($id > 0) {
            $data['id'] = $id;
            array_push($parameters, $id);
        }


        if (isset($data['id'])) {
            $sql = <<<SQL
UPDATE APIGILITY.ECOMMERCE_USERS
SET USERNAME   = ?,
    EMAIL      = ?,
    FIRST_NAME = ?,
    LAST_NAME  = ?
WHERE ID = ?
SQL;
            $result = $this->db->query($sql, $parameters);
        } else {
            $sql = new \Zend\Db\Sql($this->database_adapter);
            $insert = $sql->
                    $sql = <<<SQL
INSERT INTO sktd_characters (character_name)
VALUES (?, ?, ?, ?)
SQL;

            $result = $this->db->query($sql, $parameters);
            $data['id'] = $this->db->getDriver()->getLastGeneratedValue();
        }

        return $this->fetchOne($data['id']);
    }

    public function add($data, $id = 0) {

        $data = (array) $data;

        if ($id > 0) {
            $data['id'] = $id;
        }

        if (isset($data['id'])) {
            $sql = 'UPDATE album SET title = :title, artist = :artist WHERE id = :id';
            $result = $this->database_adapter->query($sql, $data);
        } else {
            $sql = 'INSERT INTO album (title, artist) VALUES(:title, :artist)';
            $result = $this->database_adapter->query($sql, $data);
            $data['id'] = $this->database_adapter->getDriver()->getLastGeneratedValue();
        }

        $entity = new UsersEntity();
        $entity->populate($data);
        return $entity;
    }

    public function insert($data = []) {
        $data = (array) $data;
        $sql = new Sql($this->database_adapter);
        $insert = $sql->insert('sktd_characters');
        $insert->values($data);
        $statement = $sql->prepareStatementForSqlObject($insert);
        $statement->execute();
        $lastid = $sql->getAdapter()->getDriver()->getLastGeneratedValue();
        return $this->fetchOne($lastid);
    }

    public function delete($id) {
        $QQ = new ZendDbSqlExpression('?');
        $delete = new Delete($this->table);
        $delete->where(['ID' => $QQ]);
        $result = $this->db->query($delete->getSqlString(), [$id]);

        return $result->getAffectedRows() > 0;
    }

}
