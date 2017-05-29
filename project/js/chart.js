$(document).ready(function(){
    $.ajax('chart.php', {
        data: {},
        type: 'post',
        dataType: 'json',
        success: function (response){
            
            //min-width: 310px; height: 500px; max-width: 600px; margin: 0 auto
            for (var league in response)
            {
                var _data = [];
                for (var vars in response[league])
                {
                    _data.push(response[league][vars]);
                }
                //console.log(_data);return false;
                $('<div id="league-' + league + '" style="min-width: 310px; height: 500px; max-width: 600px; margin: 0 auto"></div>').appendTo($('#charts'));
                $('#league-' + league).highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Users picks in ' + league + ' league'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Picks',
                        colorByPoint: true,
                        data: _data
                        /*data: [{
                            name: 'Microsoft Internet Explorer',
                            y: 56.33
                        }, {
                            name: 'Chrome',
                            y: 24.03,
                            sliced: true,
                            selected: true
                        }, {
                            name: 'Firefox',
                            y: 10.38
                        }, {
                            name: 'Safari',
                            y: 4.77
                        }, {
                            name: 'Opera',
                            y: 0.91
                        }, {
                            name: 'Proprietary or Undetectable',
                            y: 0.2
                        }]*/
                    }]
                });
            }
            
            
            /*$('#chart').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Users picks'
                },
                xAxis: {
                    categories: _weeks
                    //categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
                },
                yAxis: {
                    //allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Picks count'
                    }
                }/*,
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>' +
                            'Total: ' + this.point.stackTotal;
                    }
                },
                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },
                series: response.data
                /*
                series: [{
                    name: 'John',
                    data: [5, 3, 4, 7, 2],
                    stack: 'male'
                }, {
                    name: 'Joe',
                    data: [3, 4, 4, 2, 5],
                    stack: 'male'
                }, {
                    name: 'Jane',
                    data: [2, 5, 6, 2, 1],
                    stack: 'female'
                }, {
                    name: 'Janet',
                    data: [3, 0, 4, 4, 3],
                    stack: 'female'
                }]*/
            //});
        }
    });
});