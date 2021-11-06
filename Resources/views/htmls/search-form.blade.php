{!! \Form::open(['route' => $route, 'method' => 'get']) !!}
<div class="row p-3">
    <div class="col-md-12">
        <div class="input-group">
            {!! \Form::search($field, old($field, (request()->get($field) ?? null)),
                ['class' => 'form-control', 'placeholder' => $placeholder,
                 'id' =>$field]) !!}
            <div class="input-group-append">
                {!! \Form::submit('Search', ['class' => 'btn btn-primary input-group-right-btn']) !!}
            </div>
        </div>
    </div>
</div>
{!! \Form::close() !!}
