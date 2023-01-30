<div style="display:flex; justify-content: space-around;">
    <div>
        <h2>高校一覧</h2>
        <div>
            @foreach($schools as $school)
                <p>{{ $school->id }} . {{ $school->name }}</p>
            @endforeach
        </div>
    </div>

    <div>
        <h2>選手一覧</h2>
        <div>
            @foreach($characters as $character)
                <p>{{ $character->id }} . {{ $character->name }}</p>
            @endforeach
        </div>
    </div>
</div>


