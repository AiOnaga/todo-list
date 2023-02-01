<div style="display:flex; justify-content: space-around;">
    <div>
        <h2>{{ $school->name }}</h2>
        <div>
            <p>{{ $school->id }} . {{ $school->name }}</p>
        </div>
    </div>

    <div>
        <h2>{{ $school->name }}の選手一覧</h2>
        <div>
            @foreach($characters as $character)
                <p>{{ $character->id }} . {{ $character->name }}</p>
            @endforeach
        </div>
    </div>
</div>


