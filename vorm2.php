<?php 
    session_start(); 

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <style>
    body {
    background-color: skyblue;  
    text-size: 30px;
    }
	table {background: yellow;}
	caption {background: white;}
    </style>
</head>
<body>
<?php 
    if (isset($_SESSION['teade'])) {
        echo $_SESSION['teade'];
        unset($_SESSION['teade']);    
    }
        

    $user = "test";
    $pw = "t3st3r123";
    $host = "localhost";
    $db = "test";
    $conn = mysqli_connect($host, $user, $pw, $db);
    mysqli_query($conn, "SET CHARACTER SET UTF8");

   
    if (!empty($_POST)){
        // sisestamine!
        if (isset($_GET['add'])){
            // valideerimise koht
            $query= "INSERT INTO kaernits_files (autor, pealkiri, fail) VALUES ({$_POST['autor']}, '{$_POST['pealkiri']}', '{$_POST['fail']}')";
            $tulem = mysqli_query($conn, $query);
            if ($tulem) {
                $id = mysqli_insert_id($conn);
                $_SESSION['teade'] = '<p style="color:green">Faili sisestamine õnnestus (id:'.$id.')</p>';    
                header("Location: ?");    
                exit(0);
            } else {
                echo '<p style="color:red">Faili sisestamine ebaõnnestus</p>';
            // echo mysqli_error($conn);
            }
        }
      
    }

    $tulem = mysqli_query($conn, "SELECT autor, pealkiri, fail FROM kaernits_files");
    $mitu = mysqli_num_rows($tulem);

    echo '<form method="POST" action="?add">';
    echo '<table border="1">';
    echo "<caption>Siin on $mitu fail/faili</caption>";         
    

$tehtud=false;
    $v2ljad= array(); // form jaoks
    while ($row = mysqli_fetch_assoc($tulem) ){
        // $row on massiiv

        if (!$tehtud) {
            
            $tehtud=true;
        }
     	 echo "<tr>";
        foreach($row as $k => $v){
            echo "<td>";
            if ($k=="id") {
               
                echo $v;
            }
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "<tr>";
    // siia tuleb failide sisestamine
   
    echo '<input type="submit" value="Sisesta" />';
        
    echo "</tr>";
   

    echo "</table>";
    echo "</form>";
    
?>

</body>
