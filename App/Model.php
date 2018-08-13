<?php

namespace App;

abstract class Model
{
    protected $id; //свойство id, полагая, что во всех таблицах есть id

    protected static $table = null; //статическое св-во

    public function getId()
    {
        return $this->id;
    }

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;

        return $db->query($sql, static::class); //Используем статическое свойство
    }

    public static function findById(string $id) //Добавляем метод, который возвращает либо одну запись по id, либо false
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $data = $db->query( $sql, static::class, [':id' => $id] );

        if ( empty($data[0]) ) {
            return false;
        }
        return $data[0];
    }

    public function isNew()
    {
        return null === $this->id;
    }

    public function insert() //2. Добавляем метод добавления новых записей
    {
        if ( !$this->isNew() ) { //если объект существующий вернёт false
            return false;
        }
        $properties = get_object_vars($this);

        $cols = [];
        $binds = [];
        $data = [];
        foreach ($properties as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            $cols[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . '
         (' . implode(', ', $cols) . ') 
         VALUES
          (' . implode(', ', $binds) . ')';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();
    }

    public function update() //3. Добавляем метод изменения существующих записей
    {
        $properties = get_object_vars($this);

        $cols = [];
        $data = [];
        foreach ($properties as $name => $value) {

            $data[':' . $name] = $value;
            if ('id' !== $name) {
                $cols[] = $name . '=:' . $name;
            }
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';

        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save() //4. Добавляем метод сохранения записей, который решит - "новая" модель или нет и вызовет либо insert(), либо update().
    {
        if ( $this->isNew() ) { //если объект новый, то добавит новую запись
            return $this->insert();
        } else {
            return $this->update(); //иначе обновит существующую запиь
        }
    }

    public function delete() //5. Добавляем метод удаления записей
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $data = [':id' => $this->id];

        $db = new Db();
        $db->execute($sql, $data);
    }
}