<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
          <div class="text-right">
            @can('Task create')
              <a href="{{route('admin.tasks.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Ajouter Tâche</a>
            @endcan
          </div>

        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Titre</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Rôle</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Utilisateur</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">Status</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('Task access')
                @foreach($tasks as $task)
               
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light">{{ $task->title }}</td>
                  <td class="py-4 px-6 border-b border-grey-light">@foreach($task->user->roles as $role)
                  <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $role->name }}</span>
                  @endforeach
                </td>
                  <td class="py-4 px-6 border-b border-grey-light">{{ $task->user->name }}</td>
                  
                  <td class="py-4 px-6 border-b border-grey-light">
                      @if($task->publish)
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Réalisé</span>
                      @else
                      <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">En Cours</span>
                      @endif
                  </td>
                  <td class="py-4 px-6 border-b border-grey-light text-right">

                    @can('Task edit')
                    <a href="{{route('admin.tasks.edit',$task->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Modifier</a>
                    @endcan

                    @can('Task delete')
                    <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Supprimer</button>
                    </form>
                    @endcan
                  </td>
                </tr>
                
                @endforeach
                @endcan
            </tbody>
          </table>

          @can('Task access')
          <div class="text-right p-4 py-10">
            {{ $tasks->links() }}
          </div>
          @endcan
        </div>

      </div>
  </main>
</div>
</x-app-layout>
