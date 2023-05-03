<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-gray-700 text-3xl font-medium">
                    Bienvenue : {{ auth()->user()->name }}</h3>                

                <p>Rôle : <b>
                    @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                    @endforeach 
                </b> </p>

                <div class="flex flex-wrap justify-center mt-8">
                    <div class="bg-blue-500 rounded-lg px-4 py-6 m-4 flex-grow-0" style="width: 200px;">
                        <h4 class="text-white text-lg font-medium mb-2">Utilisatuers</h4>
                        <p class="text-white text-4xl font-bold">{{ $usersCount }}</p>
                    </div>

                    <div class="bg-green-500 rounded-lg px-4 py-6 m-4 flex-grow-0" style="width: 200px;">
                        <h4 class="text-white text-lg font-medium mb-2">Rôles</h4>
                        <p class="text-white text-4xl font-bold">{{ $role->count() }}</p>
                    </div>

                    <div class="bg-yellow-500 rounded-lg px-4 py-6 m-4 flex-grow-0" style="width: 200px;">
                        <h4 class="text-white text-lg font-medium mb-2">Tâches</h4>
                        <p class="text-white text-4xl font-bold">{{ $tasksCount }}</p>
                    </div>

                    <div class="bg-red-500 rounded-lg px-4 py-6 m-4 flex-grow-0" style="width: 200px;">
                        <h4 class="text-white text-lg font-medium mb-2">Tickets</h4>
                        <p class="text-white text-4xl font-bold">{{ $ticketsCount }}</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
