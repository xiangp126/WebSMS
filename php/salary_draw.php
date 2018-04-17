<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>税前薪水去向统计图</title>
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
                    ['Item', 'Amount'],
                    <?php
                        $afterArray['养老保险'] = $eInsurance;
                        $afterArray['医疗保险'] = $mInsurance;
                        $afterArray['失业保险'] = $uInsurance;
                        $afterArray['住房公积金'] = $housefund;
                        $afterArray['个税'] = $tax;
                        $afterArray['税后'] = $postTax;
                        foreach ($afterArray as $key => $value) {
                            echo "['$key', $value],";
                        } ?>
                    ]);
                // Create draw options
                var options = {
                    title: '税前薪水去向统计图',
                    is3D: true,
                    width: 900,
                    height: 500
                }
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                        draw(data, options);
            }
            google.setOnLoadCallback(drawVisualization);
        </script>
    </body>
</html>
