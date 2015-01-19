function getMinMaxDate(sprintNbr, plotArray) {
    $.ajax({
        type: "POST",
        url: "./dbs/dbsGetMinMaxDate.php",
        data: { id: sprintNbr },
        success: function (result) {
            var myResult = JSON.parse(result);
            createPlot(plotArray, myResult);
        },
        error: function (xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}