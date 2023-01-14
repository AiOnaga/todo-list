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

              <h2>お知らせ</h2>
              <p>リマインド 期限まで2日以内:<span class = "alarm">{{ $remind_list_count }}</span>件あります！</p>
              {{-- <%# 計算されたリマインダーリストを表示する %> --}}
              <div class = "remind_list_flex">
                @foreach ($remind_list as $remind)
                  <div class = "remind_list">
                    <a href="{{ route('tasks.show', ['taskId' => $remind->id]) }}">詳細を見る >></a>
                    <h3>タスク名:{{ $remind->task_name}}</h3>
                    <p>メモ:{{ $remind->content}}</p>
                    <p>予定終了日時:{{ $remind->scheduled_end_date}}</p>
                      @if($remind->diff_day <= 2 && $remind->diff_hour >= 0)
                        @if ($remind->diff_day >= 1)
                          <p>残り<span class = "alarm">{{ $remind->diff_day }}</span>日</p>
                        @else
                          <p>残り<span class = "alarm">{{ $remind->diff_hour }}</span>時間</p>
                        @endif
                      @endif
                      <a>━━━━━━━━━━━━━━━━━━━</a>
                      {{ $remind->id }}
                  </div>
                @endforeach
              </div>

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
              <div class="flex">
                <div style="margin-right: 30px">
                  <h2>完了済みタスク一覧</h2>
                  <div>
                    @if ($done_task_list)
                      @foreach ($done_task_list as $done_task)
                      <p>ID:{{ $done_task->id }}</p>
                      <p>タスク名:{{ $done_task->task_name}}</p>
                      {{-- <p>メモ:{{ $task->content}}</p>
                      <p>予定開始日:{{ $task->scheduled_start_date}}</p>
                      <p>予定終了日:{{ $task->scheduled_end_date}}</p> --}}
                      <a href="{{ route('tasks.show', ['taskId' => $done_task->id]) }}">詳細を見る >></a>
                      <p>-------------------------</p>
                      @endforeach
                    @endif
                  </div>
                </div>

                <div>
                  <h2>未完了タスク一覧</h2>
                  <div>
                    @if ($not_done_task_list)
                      @foreach ($not_done_task_list as $done_task)
                      <p>ID:{{ $done_task->id }}</p>
                      <p>タスク名:{{ $done_task->task_name}}</p>
                      {{-- <p>メモ:{{ $task->content}}</p>
                      <p>予定開始日:{{ $task->scheduled_start_date}}</p>
                      <p>予定終了日:{{ $task->scheduled_end_date}}</p> --}}
                      <a href="{{ route('tasks.show', ['taskId' => $done_task->id]) }}">詳細を見る >></a>
                      <p>-------------------------</p>
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
              
          </div>
      </div>
  </div>
</x-app-layout>
