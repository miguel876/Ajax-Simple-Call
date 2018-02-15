<?php
@$src=$_GET["src"];

function dbConnection(){
    try{
        require_once("Connections.php");
        $db=new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_dbname,$mysql_user,$mysql_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            return $db;
    }catch(PDOException $e){
    echo 'Connetion has failed, details: '.$e->getMessage();
    }
    
}

if(empty($src)){
  
}else{
    $conn=dbConnection();

//SELECT
$sql=$conn->prepare("SELECT * FROM country WHERE country.name='".$src."' ");
$sql->execute();

$sqlRowCount=$sql->rowCount();

if($sqlRowCount==0){
    echo 'No data available!';
}else{
    echo ('<table class="table">');
    echo ('<tr>');
    echo ('<th>Name</th>
           <th>Flag</th>');
    echo ('<tr>');       
    while($row= $sql->fetchObject()){
        echo '<td>'.$row->name.'</td>';
        echo '<td>'.$row->flag.'</td>';
    }
    echo ('</tr>');
    echo ('</table>');
}
}

//SEARCH
@$val=$_GET["val"];

if(empty($val)){
    echo 'Erro2';
}else{
    $conn=dbConnection();
    $sql2=$conn->prepare("SELECT * FROM team WHERE team.name='.$val.' ");
    $sql2->execute();
    $sqlRowCount2=$sql2->rowCount();

if($sqlRowCount2==0){
    echo 'No data available!';
}else{       
    while($row= $sql2->fetchObject()){
        echo $row->name;
        echo $row->badge;
    }

}


}


$conn=null;

?>