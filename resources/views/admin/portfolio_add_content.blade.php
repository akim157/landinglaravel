<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('portfolio_add'), 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Enter name portfolio']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('filter', 'Filter', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('filter', old('filter'), ['class' => 'form-control', 'placeholder' => 'Enter alias portfolio']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Images', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"No file"]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace('editor');
    </script>
</div>