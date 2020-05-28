@if(count($errors)>0)
    <div class="alter alter-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li class='dnager'>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif