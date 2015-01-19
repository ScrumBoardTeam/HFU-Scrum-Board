function getWorkload(dateArray, sprintNbr) {    
    $.ajax({
        type: "POST",
        url: "./dbs/dbsGetWorkload.php",
        data: { id: sprintNbr },
        success: function (result) {            
            var myResult = JSON.parse(result);
            var plotArray = [[],[],[],[],[],[],[],[],[],[],[],[],[],[]];
                     
            // TO_DO: Bedingung (i<Zahl) dynamisch machen um variable Sprintlängen zu ermöglichen
            for (var i = 0; i < 14; i++) {
                var dayNbr = i + 1;
                var dayLbl = 'd' + dayNbr + 'restTime';                
                plotArray[i][0] = dateArray[i];               
                plotArray[i][1] = myResult[0][dayLbl];
            }

            getMinMaxDate(sprintNbr, plotArray);
            /*  Beispiel:
                plotArray: 2014-10-27 | 240
                plotArray: 2014-10-28 | 222
                plotArray: 2014-10-29 | 205
                plotArray: 2014-10-30 | 180
                plotArray: 2014-10-31 | 158
                plotArray: 2014-11-01 | 133
                plotArray: 2014-11-02 | 115
                plotArray: 2014-11-03 | 102
                plotArray: 2014-11-04 | 89
                plotArray: 2014-11-05 | 70
                plotArray: 2014-11-06 | 52
                plotArray: 2014-11-07 | 35
                plotArray: 2014-11-08 | 10
                plotArray: 2014-11-09 | 0
            */
        },
        error: function (xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}