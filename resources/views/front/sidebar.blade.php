<div class ="col-lg-4 pl-5">
    @foreach($chanels  as $chanel)
        <ul class="list-group">
            <li class="list-group-item">{{$chanel->name}}</li>
        </ul>
    @endforeach
</div>