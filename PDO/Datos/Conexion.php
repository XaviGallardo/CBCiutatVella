<?php
class Conexion extends PDO {
	
	private const DB_HOST = 'localhost';
    private const DB_NAME = 'CBCV';
	private const DB_USER = 'root';
	private const DB_PASS = 'root';
	

	public function __construct() {
        //Sobreescribo el método constructor de la clase PDO.
        try {
            parent::__construct('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}
?>