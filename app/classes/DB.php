<?php

/**
 * Classe para conexão com o banco de dados
 */
class DB {

	private $host = 'localhost',    // Host da base de dados 
	private $dbName = 'database',   // Nome do banco de dados
	private $password = '',         // Senha do usuário da base de dados
	private $user = 'root',         // Usuário da base de dados
	private $charset = 'utf8',      // Charset da base de dados
    private $pdo = null,            // Conexão com o BD

	public function __construct(
		$host     = null,
		$dbName  = null,
		$password = null,
		$user     = null,
		$charset  = null,
		$debug    = null
	) {
		$this->host = defined('HOSTNAME') ? HOSTNAME : $this->host;
		$this->dbName = defined('DB_NAME') ? DB_NAME : $this->dbName;
		$this->password = defined('DB_PASSWORD') ? DB_PASSWORD : $this->password;
		$this->user = defined('DB_USER') ? DB_USER : $this->user;
		$this->charset = defined('DB_CHARSET') ? DB_CHARSET : $this->charset;

		$this->connect();	
	}
	
	/**
	 * Cria a conexão PDO
	 *
	 * @final
	 * @access protected
	 */
	final protected function connect() {
	
		/* Detalhes da conexão PDO */
		$pdoDetails = "mysql:host={$this->host};";
		$pdoDetails .= "dbname={$this->dbName};";
		$pdoDetails .= "charset={$this->charset};";

		try {		
			$this->pdo = new PDO($pdoDetails, $this->user, $this->password);

			if ($this->debug === true) {
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);				
			}

			unset($this->host);
			unset($this->dbName);
			unset($this->password);
			unset($this->user);
			unset($this->charset);
		} catch (PDOException $e) {
			if ($this->debug === true) {
				echo "Erro: " . $e->getMessage();				
			}

			die();
		}
	}
}