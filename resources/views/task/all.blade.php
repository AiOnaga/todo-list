<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('タスク一覧') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="flex justify-between">

              @foreach ($users as $user)
              <div>
                <p class="font-semibold text-xl">{{ $user->id }} : {{ $user->name }}</p>
                <div>
                  @foreach ($user->tasks as $task)
                    <p>{{ $task->task_name }}</p>
                    <p>サブタスク数：{{ $task->sub_tasks->count() }}</p>
                    {{-- @if ($task) --}}
                    <a href="{{ route('user.tasks.show', ['userId' => $user->id, 'taskId' => $task->id]) }}">詳細を見る >></a>
                    {{-- @endif --}}
                    <p>-------------------------</p>
                  @endforeach
                </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</x-app-layout>
