<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>税前薪水去向统计图</title>
        <link href="google_api/tooltip.css" rel="stylesheet" type="text/css">
    </head>

    <body style="font-family: Arial;border: 0 none;">

        <!-- where the chart will be rendered -->
        <div id="visualization" style="width: 600px; height: 400px;"></div>

            <!-- load api -->
        <script type="text/javascript" src="google_api/jsapi.js"></script>

        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
        <script src="googl_api/corechart.js" type="text/javascript"></script>
        <link href="google_api/ui+en.css" type="text/css" rel="stylesheet">
        <script src="google_api/corechart+en.I.js" type="text/javascript"></script>

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
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                        draw(data, {title:"税前薪水去向统计图"});
            }
            google.setOnLoadCallback(drawVisualization);
        </script>
    </body>
</html>
