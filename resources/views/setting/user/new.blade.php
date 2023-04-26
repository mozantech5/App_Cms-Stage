<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2 pb-16">

            
              <div class="bg-white shadow-md rounded my-6 p-5">
              <div class="text-right">
              <a class="inline-flex  items-center justify-center h-8 w-8 rounded-full bg-red-500 text-white hover:bg-red-700" href="{{ route('admin.users.index') }}" >
                  X
                </a>
              </div>
                <form method="POST" action="{{ route('admin.users.store')}}">
                  @csrf
                  @method('post')
                  <div class="flex flex-col space-y-2">
                    <label for="name" class="text-gray-700 select-none font-medium">Nom d'utilisateur</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                      placeholder="Enter nom" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
        
                <div class="flex flex-col space-y-2">
                    <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email') }}"
                      placeholder="Enter email" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                
                <div class="flex flex-col space-y-2">
                    <label for="password" class="text-gray-700 select-none font-medium">Mot de Passe</label>
                    <input id="password" type="password" name="password" value="{{ old('password') }}"
                      placeholder="Enter mot de passe" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                
                <div class="flex flex-col space-y-2">
                    <label for="password_confirmation" class="text-gray-700 select-none font-medium">Confirmer Mot de Passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-enter mot de passe" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>

                <h3 class="text-xl my-4 text-gray-600">Role</h3>
                <div class="grid grid-cols-3 gap-4">
                  @foreach($roles as $role)
                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]" value="{{$role->id}}"
                                  ><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                              </label>
                          </div>
                      </div>
                  @endforeach
                </div>
                <div class="text-center mt-16 mb-16">
                  <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Ajouter</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
</x-app-layout>
