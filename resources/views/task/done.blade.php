<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('タスクの編集') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              {{-- <div class="p-6 text-gray-900">
                  {{ __("You're logged in!") }}
              </div> --}}
              <h2>タスクの完了</h2>
              <form action="{{ route('tasks.update.done', ['taskId' => $task->id]) }}" method="post">
                @method('PUT')
                @csrf

                  <div>
                      <label for="done_at">タスク完了日時: </label>
                      <input type="datetime-local" name = "done_at" >
                  </div>
                  
                  <input type="submit" value="変更！">
              </form>
          </div>
      </div>
  </div>
</x-app-layout>
