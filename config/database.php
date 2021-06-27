<?php 

class Database{
    protected $oPDO;

    public function __construct() {
        $this->PDOConnect();
    }

    public function PDOConnect()
    {
        try {
            $this->oPDO = new PDO('mysql:host=localhost;dbname=dev_webservice;port=3308', 'root', '');
        } catch (PDOException $e) {
            print 'Error en la conexión'.$e->getMessage();
            die();
        }
    }

    public function getPDO():PDO
    {
        return $this->oPDO;
    }
}