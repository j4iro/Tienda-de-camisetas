<?php


class Usuario 
{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db ;

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
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $this->db->real_escape_string($apellido);
    }
 
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($this->db->real_escape_string($password),PASSWORD_BCRYPT,['cost'=>4]);   
    }

    public function getRol()
    {
        return $this->rol;
    }
 
    public function setRol($rol)
    {
        $this->rol = $rol;        
    }


    /**
     * GUARDAR
     */

     public function save()
     {
         $sql = "INSERT INTO usuarios VALUES (NULL, '{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','user','null')";
         $save = $this->db->query($sql);

         $result = false;

         if ($save) { $result = true; }
         return $result;
     }
}


