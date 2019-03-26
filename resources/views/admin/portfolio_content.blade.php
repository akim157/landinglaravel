<div style="margin:0px 50px 0px 50px;">
    @isset($portfolios)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Фильтры</th>
                <th>Дата создания</th>

                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->id }}</td>
                    <td>{!! Html::link(route('portfolio_edit', ['portfolio' => $portfolio->id]), $portfolio->name, ['alt' => $portfolio->name]) !!}</td>
                    <td>{{ $portfolio->filter }}</td>
                    <td>{{ $portfolio->cteated_at }}</td>
                    <td>
                        {!! Form::open(['url' => route('portfolio_edit', ['portfolio' => $portfolio->id]), 'class' => 'form-horizontal', 'method' => 'POST']) !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endisset
    {!! Html::link(route('portfolio_add'), 'New portfolio', ['alt' => 'new_portfolio']) !!}
</div>