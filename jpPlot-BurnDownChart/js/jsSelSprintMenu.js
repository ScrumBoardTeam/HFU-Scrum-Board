function createSprintMenu() {
    $.ajax({
        type: "GET",
        url: "./dbs/dbsGetSprints.php",
        success: function (result) {
            var myResult = JSON.parse(result);

            var mySelect = document.createElement("select");
            mySelect.setAttribute("id", "selSprint");
            mySelect.setAttribute("name", "selSprint");
            mySelect.setAttribute("style", "width: 150px;");

            mySelect.setAttribute("onchange", "myFunction(getDates(this.value))");

            for (var i = 0; i <= myResult.length; i++) {
                var option = document.createElement("option");
                if (i == 0) {
                    option.disabled = "true";
                    option.selected = "true";
                    option.text = "Sprint wählen...";
                    mySelect.appendChild(option);
                } else {
                    option.value = i;
                    option.text = "Sprint " + i;
                    mySelect.appendChild(option);
                }
            }
            sprintMenu.appendChild(mySelect);
        }
    });
}