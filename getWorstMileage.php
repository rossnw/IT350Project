
<?php
 //echo "started php <br/>";
class Magazines {
	private $db;
	
    public function _construct() {
	$this->db = new MySQLi('localhost','root','Er1par2!','cars');
	if($this->db->connect_errno > 0){
    die('Unable to connect to database [' . $this->db->connect_error . ']');
}
	$this->db->autocommit(FALSE);	
	}
	
	public function _destruct() {
	$this->db->close();	
	}
	
	
    public function printAll() {
    	
	$theQuery = "SELECT mileage, make, model, repairs, mpg, year FROM CarInstance ORDER BY mpg DESC LIMIT 4";
//echo $theQuery . "<br/>";
        $stmt = $this->db->prepare($theQuery);
        $stmt->execute();
        $stmt->bind_result($mileage, $make, $model, $repairs, $mpg, $year);
		
		
		$json = array();
		
        while ($stmt->fetch()) {
			$json[] = 
array("mileage"=>$mileage,
 "make"=>$make,
"model"=>$model,
 "repairs"=>$repairs,
 "mpg"=>$mpg,
 "year"=>$year);
          
        }
		echo json_encode($json);
		
        $stmt->close();
    }
}
 
//echo 'hello there <br/>';
$api = new Magazines;
$api->_construct();
$api->printAll();
$api->_destruct();
//echo "<b> the text</b>";
 
?>
