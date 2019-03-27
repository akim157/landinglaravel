<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('service_add'), 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Enter name service']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('icon', 'Icon', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('icon', old('icon'), ['class' => 'form-control', 'placeholder' => 'Enter alias service']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Text', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'),['id' => 'editor', 'class' => 'form-control','placeholder'=>'Enter text service']) !!}
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