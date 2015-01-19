function getDates(sprintNbr) {  
    $.ajax({
        type: "POST",       
        data: { id: sprintNbr },
        url: "./dbs/calculateDates.php",
        success: function (result) {
            //myResult is [] with 14 dates
            var myResult = JSON.parse(result);

            // myResult mit neuer Funktion verarbeiten          
            getWorkload(myResult, sprintNbr);     
        },
        error: function (xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
       
    });

}