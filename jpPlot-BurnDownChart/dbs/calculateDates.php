 <?php
    /*   c a l c u l a t e   d a t e s   */
    /*===================================*/
    
    $sprintNbr = $_POST["id"];
     
    // open DB connection
    require_once('./dbsConnect.php');

    // build SQL statment
    $sql = "SELECT startdate FROM `sb_sprints2` WHERE sprintNbr = $sprintNbr;";      
     
    // execute SQL statment
    $result = mysqli_query($con, $sql)
    or die('Fehler bei Datenbankabfrage.');

    // result to array
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // array to string
    $startdate = join($row[0]);  

    // parse formatted date string to seconds (necessary for strtotime())
    $startdate = strtotime($startdate);  

    $dateList = array();  
    for($i=0; $i<14; $i++) {
        // retransform date and store in array (schema: YYYY-MM-DD)    
        $dateList[$i] = date("Y-m-d", $startdate); 
        $startdate = strtotime("+1 days", $startdate);         
    }    
    
    // close DB connection
    mysqli_close($con);
    
    // send result back    
    echo json_encode($dateList);
    //example: result with sprintNbr = 1: ["2014-10-27","2014-10-28","2014-10-29","2014-10-30","2014-10-31","2014-11-01","2014-11-02","2014-11-03","2014-11-04","2014-11-05","2014-11-06","2014-11-07","2014-11-08","2014-11-09"]    
    ?>