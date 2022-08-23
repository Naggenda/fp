<?php
include 'header.php';
?>

<h2>SEARCH RESULT</h2>
<div class="article-container">
<?php
if (isset($_POST['submit-search'])){
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM pests_and_diseases WHERE diseaseName LIKE '%$search%' || cdescription LIKE '%$search%' || ccontrol LIKE '%$search%' ";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    


    echo "there are ". $queryResult." results";

    if ($queryResult > 0){
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='article-box'>
    
    <a href='article.php?title=".$row['diseaseName']." '> 

      <h3>" .$row['diseaseName'] . "</h3> 
      </a>
    
      <p>".$row['cdescription']."</p>
   
   </div>
   ";
 
     }


}
else{
    echo "no results matching your search";
}


}

?>
</div>
