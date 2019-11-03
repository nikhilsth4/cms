@if($errors->any())
<div class="alert alert-danger">
    <div class="ul list-group">
        @foreach($errors->all() as $error)
        <div class="li list-group text-danger">
            {{ $error }}
        </div>
        @endforeach
    </div>
</div>
@endif