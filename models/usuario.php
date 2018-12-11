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
        return password_hash($this->db->real_escape_string($this->password),PASSWORD_BCRYPT,['cost'=>4]);   
    }

    public function setPassword($password)
    {
        $this->password = $password;
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

     public function login()
     {
        //Comprobar si existe el usuario
        $email = $this->email;
        $password = $this->password;

        $result = false;
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) 
        {
            $usuario = $login->fetch_object();
            $verify = password_verify($password,$usuario->password);

            if ($verify) 
            {
                $result = $usuario;
            }
        }

        return $result;
     }

     
}


