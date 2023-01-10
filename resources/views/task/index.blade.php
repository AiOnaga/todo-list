<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('タスク一覧') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              {{-- <div class="p-6 text-gray-900">
                  {{ __("You're logged in!") }}
              </div> --}}
              <h2>タスクの新規作成</h2>
              <form action="{{ route('tasks.store') }}" method="post">
                @csrf

                  <div>
                      <label for="task_name">タスク名: </label>
                      <input type="text" name="task_name">
                  </div>

                  <div>
                      <label for="content">メモ: </label>
                      <textarea name="content" cols=30 rows=1></textarea>    
                  </div>
                  <div>
                      <label for="scheduled_start_date">予定開始日時: </label>
                      <input type="datetime-local" name = "scheduled_start_date">
                  </div>

                  <div>
                      <label for="scheduled_end_date">予定終了日時: </label>
                      <input type="datetime-local" name = "scheduled_end_date">
                  </div>
                  
                  <input type="submit" value="タスク作成！">
              </form>
              <p>****************************</p>
              <h2>タスク一覧</h2>
                <div>
                  @foreach ($tasks as $task)
                    <p>ID:{{ $task->id }}</p>
                    <p>タスク名:{{ $task->task_name}}</p>
                    <p>メモ:{{ $task->content}}</p>
                    <p>予定開始日:{{ $task->scheduled_start_date}}</p>
                    <p>予定終了日:{{ $task->scheduled_end_date}}</p>
                    <p>-------------------------</p>
                  @endforeach
                </div>
          </div>
      </div>
  </div>
</x-app-layout>
