<?php 
class Database{
	private $server = 'localhost';
	private $usernm = 'root';
	private $passwd = '';
	private $databs = 'db_inventory';

	private function koneksi(){
		return new mysqli($this->server, $this->usernm, $this->passwd, $this->databs);
	}

	public function get_data($sQuery){
		$conn = $this->koneksi();
		$result = null;
		
		if($conn){
			$res = $conn->prepare($sQuery);
			$res->execute();
			$result = $res->get_result();
		}
		
		return $result;
	}

	public function get_data_array($sQuery){
		$data = $this->get_data($sQuery);
		
		$result = array();
		$result[] = $data->fetch_all();

		$hasil = array();
		foreach($result as $row){
			$a = array();
			foreach($row as $val){
				$a[] = $val;
			}
			$hasil = $a;
		}

		return $hasil;
	}

	public function get_data_json($sQuery){
		return json_encode($this->get_data_array($sQuery));
	}

	public function insert_data($sTable, $sField, $sValue){
		$conn = $this->koneksi();
		$result = 0;
		$sql = "";

		if($sField == ''){
			$sql = "INSERT INTO $sTable VALUES($sValue)";
		}else{
			$sql = "INSERT INTO $sTable($sField) VALUES($sValue)";
		}

		if($conn){
			$ins = $conn->prepare($sql);
			$result = $ins->execute();
			$conn->close();
		}

		return $result;
	}
}
?>