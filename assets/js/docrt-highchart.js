jQuery(document).ready(function($) {
    /*list_editor =====================================================*/
    Highcharts.chart('list_editor', {
        chart: {
            type: 'bar'
        },
        title: {
            text: null
        },

        xAxis: {
            categories: hc_list_editor.author ,
            labels: {
                formatter: function() {
                    return this.value ;
                }
            },
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Banyak Permohonan',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Surat'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        colors: ['#f45246'],
        credits: {
            enabled: false
        },
        series: [{
            name: 'Permohonan',
            data: hc_list_editor.surat_count.map(Number)
        }]
    });

    /*list_surat =====================================================*/
    Highcharts.chart('list_surat', {
        chart: {
            type: 'bar'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: hc_list_surat.slug_surat ,
            labels: {
                formatter: function() {
                    return this.value ;
                }
            },
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '<a>Banyak Permohonan</a>',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {

            valuePrefix: '',
            valueSuffix: ' Surat'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        colors: ['#0286a9'],
        credits: {
            enabled: false
        },
        series: [{
            name: 'Permohonan',
            data: hc_list_surat.jumlah_surat.map(Number)
        }]
    });

    /*list_editor_pie=====================================================*/
    Highcharts.chart('list_editor_pie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: null
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: hc_list_surat.jumlah_surat.map(function(item, $i) {
                return {
                  name: hc_list_surat.name_surat[$i],
                  y: parseInt(item, 10)
                }
            })
        }]


        });
 /*       console.log(hc_list_surat.slug_surat);
        console.log(b);*/
});
