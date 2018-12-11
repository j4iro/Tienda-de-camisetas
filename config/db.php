<?php

class Database {
    public static  function conectar(){
    $db = new mysqli ('localhost:3309','root','','tienda_master');
    $db->query('SET NAMES "utf-8"');
    return $db;
    }
}