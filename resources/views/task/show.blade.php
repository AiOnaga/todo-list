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
              <p>-------------------------</p>
              <h2>タスク詳細</h2>
                <div>
                  @if ($task)
                    {{-- @foreach ($tasks as $task) --}}
                    <p>ID:{{ $task->id }}</p>
                    <p>タスク名:{{ $task->task_name}}</p>
                    <p>メモ:{{ $task->content}}</p>
                    <p>予定開始日:{{ $task->scheduled_start_date}}</p>
                    <p>予定終了日:{{ $task->scheduled_end_date}}</p>
                    {{-- <a href="{{ route('sub_tasks.show', ['taskId' => $task->id]) }}">子タスク入力 >></a><br> --}}
                    <a href="{{ route('tasks.show.done', ['taskId' => $task->id]) }}">完了日入力 >></a>
                    <a href="{{ route('tasks.edit', ['taskId' => $task->id]) }}">編集する >></a>
                    <form action="{{ route('tasks.destroy', ['taskId' => $task->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="削除する！"><br>
                        
                        <a href="{{ route('tasks.store' )}}">戻る >></a>
                    </form>
                    
                    <p>-------------------------</p>
                    {{-- @endforeach --}}
                  @endif

                </div>

                @if ($me->id == $task->user_id)
                  
                <h2>サブタスクの新規作成</h2>
                  <form action="{{ route('sub_tasks.store',['taskId' => $taskId]) }}" method="post">
                    @csrf

                      <div>
                          <label for="sub_task_name">タスク名: </label>
                          <input type="text" name="sub_task_name">
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
                      
                      <input type="submit" value="サブタスク作成！">
                  </form>

                  @endif
                <div>
                  <p>-------------------------</p>
                  {{-- ここにサブタスク一覧 --}}
                  @foreach ( $sub_tasks as $sub_task)
                    <p>サブタスク名：{{ $sub_task->sub_task_name }}</p>
                    
                  @endforeach
                  <p>-------------------------</p>
                </div>
          </div>
      </div>
  </div>
</x-app-layout>
