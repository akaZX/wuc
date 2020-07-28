<?php
namespace CSY2028;

class DatabaseTable {
    private $pdo;
    private $table;
    private $primaryKey;
    private $entityClass;
    private $entityConstructor;

    public function __construct($pdo, $table, $primaryKey, $entityClass = 'stdclass', $entityConstructor = []) {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->entityClass = $entityClass;
        $this->entityConstructor = $entityConstructor;
    }

    public function find($field, $value) {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);
    
        return $stmt->fetchAll();
    }

    public function findCompound($field1, $value1, $field2, $value2) {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field1 . ' = :value1 AND ' . $field2 . ' = :value2');
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

        $criteria = [
            'value1' => $value1,
            'value2' => $value2
        ];
        $stmt->execute($criteria);
    
        return $stmt->fetchAll();
    }

    public function findAll() {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    public function save($record, $primaryKey) {
        try {
            $this->insert($record);
        } catch (\PDOException $e) {
            //using "\" as we are using namespaces and we need to look in global scope of classes rather than namespace
            $this->update($record, $primaryKey);
        }
    }

    public function insert($record) {
        $keys = array_keys($record);

        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);

        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

        $stmt = $this->pdo->prepare($query);

        $stmt->execute($record);
    }

    public function update($record, $primaryKey) {
        $query = 'UPDATE ' . $this->table . ' SET ';

        $parameters = [];
        foreach ($record as $key => $value) {
            $parameters[] = $key . ' = :' .$key;
        }
    
        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';
        $record['primaryKey'] = $record[$this->primaryKey];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
    }

    public function delete($field, $value) {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);
    }

    public function getLastID($field) {
        $stmt = $this->pdo->prepare('SELECT MAX('. $field .') FROM ' . $this->table);
        $stmt->execute();
        return $stmt->fetch()[0];
    }

    public function getLastIDOnCondition($field, $condition, $value) {
        $stmt = $this->pdo->prepare('SELECT MAX('. $field .') FROM ' . $this->table . ' WHERE ' . $condition . ' = :val');
        $values = ['val' => $value];
        // var_dump($stmt);
        // die();
        $stmt->execute($values);
        return $stmt->fetch()[0];
    }

    //inserts into "intermediate" table which consists of 2 fields thar are PKs in other tables
    public function insertCompound($col1, $val1, $col2, $val2) {
        $stmt = $this->pdo->prepare('INSERT INTO ' . $this->table . ' (' . $col1 . ', ' . $col2 . ') VALUES (:value1, :value2)');
        $values = [
            'value1' => $val1,
            'value2' => $val2
        ];
        $stmt->execute($values);
    }

    //deletes from database based of 2 WHERE conditions
    public function deleteCompound($cond1, $val1, $cond2, $val2) {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $cond1 . ' = :value1 AND ' . $cond2 . ' = :value2');
        $values = [
            'value1' => $val1,
            'value2' => $val2
        ];
        $stmt->execute($values);
    }

    //updates single field in a table to given value e.g. makes student status live
    public function updateSingleValue($field, $value, $condition, $conditionValue) {
        $stmt = $this->pdo->prepare('UPDATE ' . $this->table . ' SET ' . $field . ' = :value WHERE ' . $condition . ' = ' . $conditionValue);
        $values = [
            'value' => $value
        ];
        $stmt->execute($values);
    }

    public function ifUserExists($field, $value) {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);
        $count = $stmt->rowCount();
    
        if($count > 0) {
            return $stmt->fetchAll()[0];
        } else {
            return false;
        }
    }

    //make dormant, change students list to form
}

?>