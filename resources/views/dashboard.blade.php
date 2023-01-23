<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-around">

                    @foreach ($users as $user)
                        <div class="mr-2">
                            <p>{{ $user['id'] . ' : ' . $user['name'] }}</p>
                            <div>
                                @if ($user['tasks'] != null)
                                    @foreach ($user['tasks'] as $task)
                                    <div>
                                        <h3>タスク名：{{ $task['task_name'] }}</h3>
                                        <p>メモ：{{ $task['content'] }}</p>
                                        <hr>

                                        <form action="" method="post">
                                            <input type="text" name="comment-{{ $task['id'] }}" placeholder="コメント">
                                            <input type="hidden" name="task_id" value="{{ $task['id'] }}">
                                            <input type="submit" value="投稿">
                                        </form>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="mr-2">
                        <p>User1</p>
                        <div>
                            <div>aaaa</div>
                            <div>iiii</div>
                        </div>
                    </div>

                    <div class="mr-2">
                        <p>User2</p>
                        <div>
                            <div>aaaa</div>
                            <div>iiii</div>
                        </div>
                    </div>

                    <div class="mr-2">
                        <p>User3</p>
                        <div>
                            <div>aaaa</div>
                            <div>iiii</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
