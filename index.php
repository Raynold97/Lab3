<?php
$host = "remotemysql.com";
$user = "G4oyzPVLGq";
$pass = "30gVl3EQYv";
$dbname = "G4oyzPVLGq";




try{
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }


for($i=0;$i<9999;$i++)
if(isset($_POST[$i]))
 if($_POST[$i]=='Stergere')

   {
        $sql="DELETE FROM tb1_users WHERE id=$i"; 
    $q = $DBH->prepare($sql);
         $q->execute(['id' => $i]);

   }
else if($_POST[$i]=='Modificare')
echo "Vreau sa modific randul $i";


if(isset($_POST['inserare'])){
    #echo "Orice";
$statement="INSERT INTO tb1_users (id,first_name,last_name,email_id,contact) values (?,?,?,?,?)";
   $stmt = $DBH->prepare($statement);
$stmt->execute([$_POST['id'],$_POST['first_name'],$_POST['last_name'],$_POST['email_id'],$_POST['contact']]);
                
}


if(isset($_POST['Modifica'])){

$sql = "UPDATE tb1_users SET  id = :id, first_name=:first_name, last_name=:last_name, email_id=:email_id,contact=:contact WHERE id= :id";
$query = $DBH->prepare($sql);
$result = $query->execute(array(':id' => $_POST['id_m'],
 ':first_name' => $_POST['first_name_m'], 
 ':last_name'=>$_POST['last_name_m'],
 ':email_id'=>$_POST['email_id_m'],
 ':contact'=>$_POST['contact_m'] ));
}
    
$ABC = $DBH->query('SELECT * from tb1_users');
   

echo "<table id='t01' >";
echo "<tr>";
echo  " <th> id     </th>";
echo  "<th> first_name    </th>";
echo   "<th> last_name     </th>";
echo  "<th> email_id   </th>";
echo  "<th> contact </th>";
echo  "<th> stergere </th>";


while($row=$ABC->fetch()){
    echo "<tr>";
    $aux=$row['id'];
    echo "<td>".$row['id']."</td>" ;
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['last_name']."</td>";
    echo "<td>".$row['email_id']."</td>";
    echo "<td>".$row['contact']."</td>";
    echo "<td>"."<form method='post'> <input type='submit' name='$aux'
        class='btn btn-success' value='Stergere'" . "</td><tr>";
}






    


    ?>
<html>


<form method="post"> 
        <label> id </label>
        <input type="text" name="id">
        <br>
        <label> first_name </label>
        <input type="text" name="first_name">
        <br>
        <label> last_name </label>
        <input type="text" name="last_name">
        <br>
        <label> email_id</label>
        <input type="text" name="email_id">
        <br>
        <label> contact </label>
        <input type="text" name="contact">
        <br>
       

 <br><br>
        <input type="submit" name="inserare"
        class="btn btn-success" value="inserare" /> 
    <br>
    <br>
    </form>
    
    
    <form method="post"> 
        <label> id </label>
        <input type="text" name="id_m">
        <br>
        <label> first_name </label>
        <input type="text" name="first_name_m">
        <br>
        <label> last_name </label>
        <input type="text" name="last_name_m">
        <br>
        <label> email_id</label>
        <input type="text" name="email_id_m">
        <br>
        <label> contact </label>
        <input type="text" name="contact_m">
       <br>

 <br><br>
        <input type="submit" name="Modifica"
        class="btn btn-success" value="Modifica" /> 
    </form>
    
</div>
</html>
