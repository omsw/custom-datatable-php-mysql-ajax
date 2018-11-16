<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "test"; /* Database name */
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$requestData= $_REQUEST;
$columns = array(
    0 => 'id',
    1 => 'name',
    2=> 'email'
);

$sql = "SELECT id,name, email ";
$sql.=" FROM users";
$query=mysqli_query($con, $sql) or die("data.php: get users");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData; 
$searchValue = $_POST['search']['value']; 
 
$sql = "SELECT id,name, email  ";
$sql.=" FROM users WHERE 1 = 1";
 

if($searchValue != ''){
   $sql.= " and (id like '%".$searchValue."%' or name like '%".$searchValue."%' or 
        email like '%".$searchValue."%' ) ";
}

$query=mysqli_query($con, $sql) or die("data.php: get users");
$totalFiltered = mysqli_num_rows($query); 
 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
 
$query=mysqli_query($con, $sql) or die("data.php: get users");
 
$data = array();
while( $row=mysqli_fetch_array($query) ) {  
    $nestedData=array(); 
     $nestedData[] = $row["id"];
    $nestedData[] = $row["name"];
    $nestedData[] = $row["email"];
 
    $data[] = $nestedData;
}
 
$json_data = array(
            "draw"            => intval( $requestData['draw'] ), 
            "recordsTotal"    => intval( $totalData ),  
            "recordsFiltered" => intval( $totalFiltered ),
            "data"            => $data 
            );
 
echo json_encode($json_data); 

?>