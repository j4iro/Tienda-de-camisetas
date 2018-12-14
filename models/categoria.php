<?php

class Categoria 
{
    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }
 
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
        //$this->apellido = $this->db->real_escape_string($apellido);
    }

    public function getAll()
    {
        $categorias = $this->db->query("SELECT * FROM categorias ");
        return $categorias;
    }
    public function save()
    {
        $sql = "INSERT INTO categorias VALUES (NULL, '{$this->getNombre()}')";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) { $result = true; }
        return $result;
    }
}