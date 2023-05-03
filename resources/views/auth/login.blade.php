<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>APP CMS</title>
</head>
<x-guest-layout>
<div class="container max-w-lg  mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
        style="background-image: url('{{ asset('images/log.jpg') }}')">
        
    <div class="font-sans min-h-screen antialiased  pt-12 pb-4">
        <div class="flex flex-col justify-center sm:w-96 sm:m-auto mx-5 mb-5 space-y-8">
          <h1 class="font-bold text-center text-4xl text-white">Bienvenue</span></h1>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
  
            
          <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="flex flex-col bg-white p-10 rounded-lg shadow space-y-6">
              <h1 class="font-bold text-xl text-center">Connexion</h1>

              <div class="flex flex-col space-y-1">
                <input type="email" name="email" id="email" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Email" :value="old('email')" required autofocus />
              </div>

              <div class="flex flex-col space-y-1">
                <input type="password" name="password" id="password" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Password" required autocomplete="current-password"/>
              </div>
              <div class="flex flex-col-reverse sm:flex-row sm:justify-between items-center">
                <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-700 transition-colors m-auto">Se connecter</button>
              </div>
            </div>
            <div class="flex justify-center text-white text-sm mt-1">
           <b> <p>Copyright <script>document.write(new Date().getFullYear());</script></p></b>
            </div>
          </form>
                  <!-- Validation Errors -->
          <x-auth-validation-errors class="flex flex-col justify-center bg-white rounded pt-1 pb-1 mb-4 text-white" :errors="$errors" />
        </div>
    </div>
 
</div>
  </x-guest-layout>
