@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('notis-success'))

<div class="alert alert-success">

    {{ session('notis-success') }}

</div>

@endif
