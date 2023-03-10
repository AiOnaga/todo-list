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
              <h2>タスクの編集</h2>
              <form action="{{ route('tasks.update', ['taskId' => $task->id]) }}" method="post">
                @method('PUT')
                @csrf

                  <div>
                      <label for="task_name">タスク名: </label>
                      <input type="text" name="task_name" value="{{ $task->task_name }}">
                  </div>

                  <div>
                      <label for="content">メモ: </label>
                      <textarea name="content" cols=30 rows=1>{{ $task->content }}</textarea>    
                  </div>
                  <div>
                      <label for="scheduled_start_date">予定開始日時: </label>
                      <input type="datetime-local" name = "scheduled_start_date" value="{{ $task->scheduled_start_date }}">
                  </div>

                  <div>
                      <label for="scheduled_end_date">予定終了日時: </label>
                      <input type="datetime-local" name = "scheduled_end_date" value="{{ $task->scheduled_end_date}}">
                  </div>
                  
                  <input type="submit" value="変更！">
              </form>
          </div>
      </div>
  </div>
</x-app-layout>
