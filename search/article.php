<?php
include 'header.php';
?>
    
<h1> articles: </h1>
<div class="article-container">

<?php

    $title= $_REQUEST['title'];
    $sql = "SELECT * FROM pests_and_diseases WHERE diseaseName = '$title'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    


    echo "there are ". $queryResult." results";

    if ($queryResult > 0){
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='article-box'>
    
    
      <h3>" .$row['diseaseName'] . "</h3> 
    
    
      <h3>Signs and Symptoms</h3>
      <p>".$row['cdescription']."</p>
 
      <h3>Control Measures</h3>
      <p>".$row['ccontrol']."</p>
   
   </div>
   ";
 
     }


}
else{
    echo "no results matching your search";
}




?>
</div>

</body>
</html>