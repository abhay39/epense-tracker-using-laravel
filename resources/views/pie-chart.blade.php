<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart</title>
    <!-- Load the Google Charts library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Amount'],
                ['Income', <?php echo "20"; ?>],
                ['Expense', <?php echo "60"; ?>],
                ['Remaining', <?php echo "80"; ?>]
            ]);

            var options = {
                title: 'Income, Expense, and Remaining',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="piechart" style="width: 600px; height: 600px;"></div>
</body>
</html>
