<?php
class dispositivo
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto proveedor
    public $id_dispositivo;
    public $hostname;
    public $ip;
    public $tipo;
    public $fabricante;

	//Método de conexión a SGBD.
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function select_all()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM dispositivos");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

	//Este método obtiene los datos del proveedor a partir del nit
	//utilizando SQL.
	public function select($id_dispositivo)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT * FROM dispositivos WHERE id_dispositivo = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($id_dispositivo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla proveedor dado un nit.
	public function delete($id_dispositivo)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("DELETE FROM dispositivos WHERE id_dispositivo = ?");

			$stm->execute(array($nit));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el nit del proveedor.
	public function update($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE dispositivos SET
						hostname = ?,
						ip = ?,
                        tipo = ?,
                        fabricante = ?
				    WHERE id_dispositivo = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->hostname,
                        $data->ip,
                        $data->tipo,
                        $data->fabricante,
                        $data->id_dispositivo
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo proveedor a la tabla.
	public function create(dispositivo $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO dispositivos (hostname,ip,tipo,fabricante)
		        VALUES (?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->hostname,
                    $data->ip,
                    $data->tipo,
                    $data->fabricante,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
