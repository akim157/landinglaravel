<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('portfolio_edit',['page' => $portfolio->id]), 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

    {!! Form::hidden('id', $portfolio->id) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $portfolio->name, ['class' => 'form-control','placeholder'=>'Enter name portfolio']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('filter', 'Filter', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('filter', $portfolio->filter, ['class' => 'form-control','placeholder'=>'Enter alias portfolio']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Images', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('img/'.$portfolio->images,'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $portfolio->images) !!}
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
</div>