function createPlot(plotArray, minMaxDate) {

    var res1 = minMaxDate[0]['startdate'].toString();
    var res2 = minMaxDate[0]['enddate'].toString();  
  
    var plot1 = $.jqplot('chart1', [plotArray], {
        //title for chart
        title: '3. Sprint - BurnDownChart',
        //labeling for chart axis
        axes: {
            xaxis: {
                label: 'Zeit (Tage)',
                renderer: $.jqplot.DateAxisRenderer,  //needed for datum formatting

                //foramtting options:
                /*
               %b  = Monat (ausgeschriebn)
               %#d = Tag (als Zahl)
               %y  = Jahr (als Zahl)
               ? %#I = Uhrzeit
               ? %p  = AM/PM
               */
                tickOptions: { formatString: '  %#d\n %b' },

                //min/max values for y-axis
                min: res1,                     
                max: res2,
                tickInterval: '2 days'
            },
            yaxis: {
                label: 'Arbeitspensum <br> (Personenstd.)',
                labelOptions: {
                    fontFamily: 'Georgia, Serif',
                    fontSize: '12pt'
                },
                //min/max values for y-axis
                min: 0,
                max: 250,
                tickInterval: 25
            }
        },
        series: [{ lineWidth: 4, markerOptions: { style: 'circle' }, pointLabels: { show: true } }]
    });
}