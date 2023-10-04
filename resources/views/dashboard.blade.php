<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')

    <?php
    $jsonData = auth()->user();
    $data = json_decode($jsonData, true);
    
    $totalIncome = 0;
    $totalExpense = 0;
    $totalBalance = 0;

    if ($data !== null && is_array($data)) {
        if (isset($data['income']) && is_array($data['income'])) {
            foreach ($data['income'] as $incomeItem) {
                $totalIncome += $incomeItem['incomeAmount'];
            }
        }

        if (isset($data['expense']) && is_array($data['expense'])) {
            foreach ($data['expense'] as $expenseItem) {
                $totalExpense += $expenseItem['expenseAmount'];
            }
        }

        $totalBalance = $totalIncome - $totalExpense;
        $totalBalance = number_format($totalBalance, 2);
        $totalIncome = number_format($totalIncome, 2);
        $totalExpense = number_format($totalExpense, 2);
    }
    ?>

    


</head>
<body>
    <div class="md:flex md:h-[100vh] sm:h-full">
        <div class="bg-black p-3 text-white md:w-80 sm:h-full items-center justify-center ">
            <h1 class="text-3xl font-bold mb-10 mt-10 select-none cursor-pointer text-center hover:text-green-500 transition duration-2000 ease-in-out" >Dashboard</h1>
            <nav class="mt-20 p-5">
                <ul>
                    <a href="/">
                        <div class="flex items-center cursor-pointer mb-8 select-none">
                            <img src="/home.png" height="30" width="30" class="ml-2 mix-blend-lighten"/>
                            <li class="ml-2 text-orange-900 font-bold">Home</li>
                        </div> 
                    </a>
                        <a href="/addIncome">
                        <div  class="flex items-center cursor-pointer mb-8 select-none">
                            <img src="/money.png" height="30" width="30" class="ml-2 mix-blend-lighten"/>
                            <li class="ml-2 opacity-50">Add Income</li>
                        </div>
                    </a>
                    <a href="/addExpense">
                        <div class="flex items-center cursor-pointer mb-8">
                            <img src="/money.png" height="30" width="30" class="ml-2 mix-blend-lighten"/>
                            <li class="ml-2 opacity-50">Add Expense</li>
                        </div>
                    </a>

                    <a href="/showTransactions">
                        <div class="flex items-center cursor-pointer mb-8 select-none">
                            <img src="/transaction.png" height="30" width="30" class="ml-2 mix-blend-lighten"/>
                            <li class="ml-2 opacity-50">Show Transactions</li>
                        </div>
                    </a>

                    <div class="flex items-center md:fixed md:bottom-4 cursor-pointer">
                        <form action="/logout" method="POST" class="flex">
                            @csrf
                            <img src="/logout.png" height="30" width="30"/>
                            <button class="text-red-400 ml-2">Logout</button>
                        </form>
                    </div>
                </ul>
            </nav>
        </div>



        <div class="md:ml-5 p-5 md:w-2/3 sm:w-full">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold">Hey, {{auth()->user()->username}}</h1>
                <div>
                    <p id="current-date-time">{{ date('Y-m-d H:i:s') }}</p>
                </div>
            
                <script>
                    // Function to update the date and time every second
                    function updateDateTime() {
                        const currentDateTimeElement = document.getElementById('current-date-time');
                        const currentDateTime = new Date();
                        const formattedDateTime = currentDateTime.toLocaleString();
            
                        currentDateTimeElement.textContent = formattedDateTime;
                    }
            
                    // Update the date and time initially
                    updateDateTime();
            
                    // Update the date and time every second
                    setInterval(updateDateTime, 1000);
                </script>
            </div>

            
            <div class="mt-6 flex flex-wrap justify-between">

                <div class="bg-green-500 text-white p-3 rounded shadow-lg md:w-40 sm:w-full flex flex-col items-center justify-center h-22 mb-3">
                    <img src="/money.png" height="30" width="30" class="ml-2 mix-blend-lighten"/>
                    <h2 class="font-bold">
                        &#x20B9;.
                       <?php 
                        echo $totalIncome;
                        ?>
                    </h2>
                    <p>Income</p>
                </div>

                <div class="bg-red-500 text-white p-3 rounded shadow-lg md:w-40 sm:w-full flex flex-col items-center justify-center h-22 mb-3">
                    <img src="/money.png" height="30" width="30" class="ml-2 mix-blend-lighten"/>
                    <h2 class="font-bold">
                        &#x20B9;.
                       <?php 
                        echo $totalExpense;
                        ?>
                    </h2>
                    <p>Expenses</p>
                </div>

                <div class="bg-orange-500 text-white p-3 rounded shadow-lg md:w-40 sm:w-full flex flex-col items-center justify-center h-22 mb-3">
                    <img src="/money.png" height="30" width="30" class="ml-2 mix-blend-lighten"/>
                    <h2 class="font-bold">
                        &#x20B9;.
                       <?php 
                        echo $totalBalance;
                        ?>
                    </h2>
                    <p>Remaining</p>
                </div>
            </div>
           
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
            
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Category', 'Amount'],
                        ['Income', <?php echo $totalIncome; ?>],
                        ['Expense', <?php echo $totalExpense; ?>],
                        ['Remaining', <?php echo $totalBalance; ?>]
                    ]);
            
                    var options = {
                        title: 'Pie Chart of Income and Expenses',
                        pieHole: 0.3,
                    };
            
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            
                    chart.draw(data, options);
                }
            </script>

            
            
            </div>
    
</body>
</html>