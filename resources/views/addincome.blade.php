{{-- <h1>Hey, {{auth()->user()->username}}</h1> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Income</title>
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
                            <li class="ml-2 text-orange-900 font-bold ">Add Income</li>
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

            <div class="flex items-center justify-center md:h-[100vh] sm:h-full">
                <div class="mt-6 flex flex-col  bg-gray-300 p-8  items-center justify-center">
                <h1 class="text-2xl font-bold">Add Income </h1>
                <form action="/addIncomeData" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="text-xl" for="incomeName">Income Name: </label>
                        <br>
                        <input type="text" name="incomeName" placeholder="Enter Income Name" class="w-full p-3 rounded text-lg border-none outline-none">
                    </div>
                    <div class="mb-3">
                        <label class="text-xl" for="incomeName">Income Amount: </label>
                        <br>
                        <input type="number" name="incomeAmount" placeholder="Enter Income Amount" class="w-full p-3 rounded text-lg border-none outline-none">
                    </div>
                    <div class="mb-3">
                        <label class="text-xl" for="incomeName">Income Category: </label>
                        <br>
                        <input type="text" name="incomeCategory" placeholder="Enter Income category" class="w-full p-3 rounded text-lg border-none outline-none">
                    </div>

                    <div class="mb-3">
                        <label class="text-xl" for="incomeName">Income Date: </label>
                        <br>
                        <input type="date" name="incomeDate" placeholder="Enter Income Amount" class="w-full p-3 rounded text-lg border-none outline-none">
                    </div>
                    <input class="bg-green-800 p-3 rounded text-lg font-bold w-full text-white cursor-pointer" type="submit" value="Add Income" class="w-1/2">
                </form>
            </div>
        </div>
        </div>
    </div>

    
</body>
</html>