<?php

namespace App;

class Db    //Улучшаем класс Db.
{
    protected $dbh;
    protected $cfg;
    protected $dsn;

    public function __construct()
    {
        $this->cfg = Config::instance();
        $this->dsn = 'mysql:host=' . $this->cfg->data['db']['host'] . ';dbname=' . $this->cfg->data['db']['dbname'];
        $this->dbh = new \PDO( $this->dsn, $this->cfg->data['db']['username'], $this->cfg->data['db']['password'] );
        //$this->dbh = new \PDO('mysql:host=localhost;dbname=php2test', 'root', '');
    }

    public function query( string $sql, string $class, array $data = [] ) //Добавляем в метод возможность передавать подстановку в запрос
    {
        $sth = $this->dbh->prepare($sql);

        if ( $sth->execute($data) ) {
            return $sth->fetchAll( \PDO::FETCH_CLASS, $class );
        }
    }

    public function execute( string $query, array $params = [] ) //Добавляем описание метода execute( $query, $params = [] )
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId(); //возвратит id последней вставленной записи
    }
}