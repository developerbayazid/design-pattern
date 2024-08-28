<?php

abstract class AbstractDatabase {
    abstract function getConnection();
}

abstract class AbstractDatabaseFactory {
    abstract function create();
}

class MySQLServer extends AbstractDatabase {
    function getConnection(){
        echo "MySQL Connection\n";
    }
}
class PostgreSQLServer extends AbstractDatabase {
    function getConnection(){
        echo "PostgreSQL Connection\n";
    }
}
class MSSQLServer extends AbstractDatabase {
    function getConnection(){
        echo "MSSQL Connection\n";
    }
}

class MySQLFactory extends AbstractDatabaseFactory{
    function create(){
        return new MySQLServer();
    }
}
class PostgreSQLFactory extends AbstractDatabaseFactory{
    function create(){
        return new PostgreSQLServer();
    }
}
class MSSQLFactory extends AbstractDatabaseFactory{
    function create(){
        return new MSSQLServer();
    }
}

class DatabaseFactory {
    function getMySQL(){
        return new MySQLFactory();
    }
    function getPostgreSQL(){
        return new PostgreSQLFactory();
    }
    function getMSSQL(){
        return new MSSQLFactory();
    }
}

$df = new DatabaseFactory();

$mysqlF = $df->getMySQL();
$mysql = $mysqlF->create();
echo $mysql->getConnection();

$postgreSqlF = $df->getPostgreSQL();
$postgresql = $postgreSqlF->create();
echo $postgresql->getConnection();

$mssqlF = $df->getMSSQL();
$mssql = $mssqlF->create();
echo $mssql->getConnection();