<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('page_edit',['page' => $page->id]), 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

    {!! Form::hidden('id', $page->id) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $page->name, ['class' => 'form-control','placeholder'=>'Enter name page']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias', 'Alias', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', $page->alias, ['class' => 'form-control','placeholder'=>'Enter alias page']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Text', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $page->text, ['id' => 'editor', 'class' => 'form-control', 'placeholder'=>'Enter text page']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Images', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('img/'.$page->images,'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $page->images) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Select image','data-buttonName'=>"btn-primary",'data-placeholder'=>"No file"]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Save', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace( 'editor' );
    </script>
</div>