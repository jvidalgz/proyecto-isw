<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
    </button>
    @foreach($errors->all() as $error)
        <ul>
            <li>
                {!! $error !!}
            </li>
        </ul>
    @endforeach
</div>