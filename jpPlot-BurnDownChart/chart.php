<!DOCTYPE html>

<head>
	<title>Sprint Burn-down Chart</title>

    <style type="text/css">    
        #slidWrapper {
                float:left;
                width: 180px;
                height: 100%;
                margin-left: 50px;
                border-width: thin;
                border-color: #808080;
                border-style:dotted;
            }
            .sliderDiv {   
                text-align: center;      
            }    
    </style>    
    
    <!--    I N C L U D E S   -->
    <!--======================-->
    
	<link rel="stylesheet" type="text/css" href="./template/template.css">
    
    <!-- include jQuery from google -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- jsGetDates uses calculateDates.php -->
    <script src="./js/jsGetDates.js"></script>  
    <!-- 
        jsGetWorkload uses dbsGetWorkload
        note: *current hard-coded to 14 days
              *dbsGetWorkload SQL statment syntax (?)
    -->
    <script src="./js/jsGetWorkload.js"></script>
    <script src="./js/jsPlotChart.js"></script>
    <script src="./js/jsSelSprintMenu.js"></script>
    <script src="./js/jsMinMaxDate.js"></script>
    
    
    <!--    FROM BURNDOWNCHART OLD  -->
        <link class="include" rel="stylesheet" type="text/css" href="./src/jquery.jqplot.min.css" />
        <link rel="stylesheet" type="text/css" href="./src/examples/examples.min.css" />
        <link type="text/css" rel="stylesheet" href="./src/examples/syntaxhighlighter/styles/shCoreDefault.min.css" />
        <link type="text/css" rel="stylesheet" href="./src/examples/syntaxhighlighter/styles/shThemejqPlot.min.css" />
    <!-- Don't touch this! -->
        <script class="include" type="text/javascript" src="./src/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="./src/examples/syntaxhighlighter/scripts/shCore.min.js"></script>
        <script type="text/javascript" src="./src/examples/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
        <script type="text/javascript" src="./src/examples/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
    <!-- End Don't touch this! -->
    <!-- selber importiert-->
        <script class="include" language="javascript" type="text/javascript" src="./src/plugins/jqplot.canvasAxisLabelRenderer.js"></script>   
    <!-- Additional plugins go here -->
        <!-- Date axes support is provided through the dateAxisRenderer plugin - ohne keine Beschriftung und keine Funktion -->
        <script class="include" language="javascript" type="text/javascript" src="./src/plugins/jqplot.dateAxisRenderer.min.js"></script>
    <!-- End additional plugins -->
    

    <script>
        function myFunction(value) {
            document.getElementById("output").innerHTML += value + "<br>";
        }   
        
        /*   c h a n g e   s l i d e r    */
        /*--------------------------------*/   
        function sliderChange(theID, val) {
            if (theID == "xStatus") {
                document.getElementById('xStatus').innerHTML = val;
            } else {
                document.getElementById('yStatus').innerHTML = val;
            }
        }
    </script>
</head>

<body onload="createSprintMenu()">
    <div id="content">
	    <h2>Sprint Burn-down Chart</h2>
        <div id="sprintMenu"></div>
        <hr/>
		<!--    c a n v a s   d i v -->
        <div id="chart1" style="height:300px; width:580px;"></div>
        <br />
        <!--    s l i d e r    -->
        <!--===================-->
        <!-- momentan noch ohne Funktion - mit den Slidern soll das Tick-Interval der Achsen gesteuert werden-->
        <div id="slidWrapper">
            <div class="sliderDiv"><span id="xStatus">3</span></div>
            <div class="sliderDiv"><input type="range" min="1" max="10" value="3" step="1" oninput="sliderChange('xStatus', this.value)" /></div>
            <div class="sliderDiv">x-Achse</div>
        </div>

        <div id="slidWrapper">
            <div class="sliderDiv"><span id="yStatus">3</span></div>
            <div class="sliderDiv"><input type="range" min="1" max="10" value="3" step="1" oninput="sliderChange('yStatus', this.value)" /></div>
            <div class="sliderDiv">y-Achse</div>
        </div>
    </div>
</body>
</html>