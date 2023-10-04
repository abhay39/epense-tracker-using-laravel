{{-- <h1>Hey, {{auth()->user()->username}}</h1> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transactions</title>
    @vite('resources/css/app.css')
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
                            <li class="ml-2 opacity-50">Home</li>
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
                            <li class="ml-2 text-orange-900 font-bold ">Show Transactions</li>
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
            

            <div>
                <h2 class=" text-red-700 text-center text-3xl font-bold mt-4 mb-3">Income Transactions</h2>  
                
                <table class="w-full mb-3 border-collapse border bg-white rounded-lg shadow-md">
                    <thead>
                        <tr>
                            <th class="border border-gray-400 p-2">Income Name</th>
                            <th class="border border-gray-400 p-2">Income Amount</th>
                            <th class="border border-gray-400 p-2">Income Date</th>
                            <th class="border border-gray-400 p-2">Income Category</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $jsonData = auth()->user();
                    // Decode the JSON data into a PHP associative array
                        $data = json_decode($jsonData, true); foreach ($data['income'] as $incomeItem): 
                        ?>
                    
                    <tr>
                        <td class="border border-gray-400 p-2"><?php echo $incomeItem['incomeName']; ?></td>
                        <td class="border border-gray-400 p-2">
                            <p>&#x20B9;.
                            <?php echo $incomeItem['incomeAmount']; ?></p></td>
                        <td class="border border-gray-400 p-2"><?php echo $incomeItem['incomeDate']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $incomeItem['incomeCategory']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

                </table>

                <h2 class=" text-red-700 text-center text-3xl font-bold mt-4">Expense Transactions</h2>
                <table class="w-full border-collapse border mt-6 bg-white rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="border border-gray-400 p-2">Expense Name</th>
                <th class="border border-gray-400 p-2">Expense Amount</th>
                <th class="border border-gray-400 p-2">Expense Date</th>
                <th class="border border-gray-400 p-2">Expense Category</th>
            </tr>
        </thead>
                    <tbody>
                    <?php foreach ($data['expense'] as $expenseItem): ?>
                    <tr>
                        <td class="border border-gray-400 p-2"><?php echo $expenseItem['expenseName']; ?></td>
                        <td class="border border-gray-400 p-2">
                            <p>&#x20B9;.
                            <?php echo $expenseItem['expenseAmount']; ?> </p></td>
                        <td class="border border-gray-400 p-2"><?php echo $expenseItem['expenseDate']; ?></td>
                        <td class="border border-gray-400 p-2"><?php echo $expenseItem['expenseCategory']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    
</body>
</html>