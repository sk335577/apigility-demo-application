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

        if ($id > 0) {
            $data['id'] = $id;
        }

        if (isset($data['id'])) {
            $sql = 'UPDATE album SET character_name = :character_name, real_name = :real_name WHERE id = :id';
            $result = $this->database_adapter->query($sql, $data);
        } else {
            $sql = 'INSERT INTO album (character_name, real_name) VALUES(:character_name, :real_name)';
            $result = $this->database_adapter->query($sql, $data);
            $data['id'] = $this->database_adapter->getDriver()->getLastGeneratedValue();
        }

        $entity = new CharactersEntity();
        $entity->exchangeArray($data);
//        $entity->populate($data);//This will also work
        return $entity;
//        return $this->fetchOne($data['id']);//This will also work
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

    public function update($data = [], $id = 0, $extra_filters = []) {
        $data = (array) $data;
        $sql = new Sql($this->database_adapter);
        $update = $sql->update('sktd_characters');
        $update->set($data);
        $update->where(['id' => $id]);
        if (!empty($extra_filters)) {
            $update->where($extra_filters);
        }
        $statement = $sql->prepareStatementForSqlObject($update);
        $result = $statement->execute();
        if ($result->count() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id = 0, $extra_filters = []) {
        $sql = new Sql($this->database_adapter);
        $delete = $sql->delete('sktd_characters');

        if ($id > 0) {
            $update->where(['id' => $id]);
        }

        if (!empty($extra_filters)) {
            $update->where($extra_filters);
        }

        $statement = $sql->prepareStatementForSqlObject($delete);
        $result = $statement->execute();

        if ($result->count() >= 1) {
            return true;
        } else {
            return false;
        }
    }

}
