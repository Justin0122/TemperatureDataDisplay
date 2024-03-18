<div>
    <div class="flex justify-between items-center">
        <div id="chart" class="w-full text-white"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @script
    <script>
        const temperatures = @json($temperatures);
        console.log(temperatures);

        const groupedTemperatures = temperatures.reduce((groups, item) => {
            const groupId = item.sensor_id;
            if (!groups[groupId]) {
                groups[groupId] = [];
            }
            groups[groupId].push(item);
            return groups;
        }, {});

        const series = Object.entries(groupedTemperatures).map(([sensorId, group]) => {
            group.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
            const data = group.map(item => [new Date(item.created_at).getTime(), item.value]);
            return {name: `Sensor ${sensorId}`, data};
        });

        var options = {
            theme: {
                palette: 'palette7'
            },
            series: series,
            chart: {
                type: 'area',
                stacked: false,
                height: 350,
                zoom: {
                    type: 'x',
                    enabled: true,
                    autoScaleYaxis: false
                },
            },
            dataLabels: {
                enabled: false
            },
            markers: {
                size: 2,
            },
            title: {
                text: 'Temperature',
                align: 'left',
                style: {
                    color: '#ffffff'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    gradientToColors: ['#3e5df8', '#FF4500'],
                    opacityFrom: 0.8,
                    opacityTo: 0.1,
                    stops: [0, 90, 100]
                },
            },
            yaxis: {
                labels: {
                    formatter: function (val) {
                        return val.toFixed(2);
                    },
                    style: {
                        colors: '#ffffff'
                    }
                },
                title: {
                    text: 'Temperature (°C)',
                    style: {
                        color: '#ffffff'
                    }
                },
            },
            xaxis: {
                type: 'datetime',
                tickAmount: 100,
                labels: {
                    style: {
                        colors: '#ffffff'
                    }
                }
            },
            tooltip: {
                shared: false,
                y: {
                    formatter: function (val) {
                        return val.toFixed(2) + '°C';
                    }
                },
                theme: 'dark'
            },
            grid: {
                borderColor: '#ce0000',
                strokeDashArray: 7,
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
    @endscript

</div>
