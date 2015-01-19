 <?php  
 
    $sprintNbr = $_POST["id"];
    
    // open DB connection
    require_once('./dbsConnect.php');

    // build SQL statment
    $sql = "SELECT startdate, enddate"."
            FROM `sb_sprints2`".
            "WHERE sprintNbr = $sprintNbr;";      
     
    // execute SQL statment
    $result = mysqli_query($con, $sql)
    or die('Fehler bei Datenbankabfrage.');

    // result to array
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
       
    // close DB connection
    mysqli_close($con);
    
    // send result back    
    echo json_encode($row); 
    //result: [{"d1restTime":"240","d2restTime":"222","d3restTime":"205","d4restTime":"180","d5restTime":"158","d6restTime":"133","d7restTime":"115",
    //          "d8restTime":"102","d9restTime":"89","d10restTime":"70","d11restTime":"52","d12restTime":"35","d13restTime":"10","d14restTime":"0"}]
?>