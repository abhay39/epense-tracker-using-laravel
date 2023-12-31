<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')<title>Login</title>
</head>

<body>
  <div class="h-[100vh] flex flex-col  md:flex-row ">
    <div class="bg-black w-full p-3 text-white text-center text-3xl font-bold h-40 md:h-[100vh] items-center justify-center flex select-none">
      <h1 class="hover:transition ease-in-out cursor-pointer">S.S. Karyana Store</h1>
    </div>

    <div class="flex justify-center w-full items-center  p-6 space-x-5 space-y-5">
      
      
      <form method="POST" action="/login" class="bg-slate-300 p-5 rounded">
        @csrf
        <h1 class="text-4xl font-bold text-black text-center">
          Login
        </h1>

       <div class="mt-2">
        <label class="text-base text-black">
          Username
        </label>
        <br />
        <input value="{{old('username')}}" name="username"  placeholder="Enter your username" class="p-2 rounded border-green-300 outline-none sm:w-[100%] md:w-[250px]"/>
        @error('username')
        <p class="shadow-sm text-red-600">{{$message}}</p>
      @enderror
       </div>

       <div class="mt-2">
        <label class="text-base text-black">
          Password
        </label>
        <br />
        <input value="{{old('password')}}"  name="password" type="password" placeholder="Enter your username" class="p-2 rounded border-green-300 outline-none sm:w-[100%] md:w-[250px]"/>
        @error('password')
        <p class="shadow-sm text-red-600">{{$message}}</p>
      @enderror
       </div>
       <div>
        <input type="submit" value="Login" class="p-2 bg-cyan-700 items-center justify-center text-center mt-2 sm:w-[100%] md:w-[250px] rounded text-white text-lg cursor-pointer" />
       </div>
       <div class="flex">
         <p class="text-sm text-center">Don't have an account?  
        <a href="/signUp" class="text-sm text-center cursor-pointer underline text-black user-select:none"> SignUp</a>
       </div> 
      </form>
    </div>
  </div>
</body>
</html>