<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>年度工资曲线图</title>
        <link href="gapi/tooltip.css" rel="stylesheet" type="text/css">
    </head>

    <body style="font-family: Arial;border: 0 none;">

        <!-- where the chart will be rendered -->
        <div id="visualization" style="width: 600px; height: 400px;"></div>

            <!-- load api -->
        <script type="text/javascript" src="gapi/jsapi.js"></script>

        <!--
        <script type="text/javascript">
            load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
        -->

        <script type="text/javascript" src="gapi/jsapi.js" ></script>
        <script type="text/javascript" src="gapi/uds_api_contents.js"></script>

        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Month', '税后薪水', '税前薪水'],
                    <?php
                        foreach ($drawArray as $key => $value) {
                            echo "['$key' + '月份', $value[0], $value[1]],";
                        } ?>
                ]);
                var options = {
                    // title: '个人工资年度曲线图',
                    curveType: 'function',
                    legend: { position: 'middle' },
                    width: 900,
                    height: 500
                };
                // Create and draw the visualization.
                new google.visualization.LineChart(document.getElementById('visualization')).
                        draw(data, options);
            }
            google.setOnLoadCallback(drawVisualization);
        </script>
    </body>
</html>
