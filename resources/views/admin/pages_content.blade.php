<div style="margin:0px 50px 0px 50px;">
    @isset($pages)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Псевдоним</th>
                <th>Текст</th>
                <th>Дата создания</th>

                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{!! Html::link(route('page_edit', ['page' => $page->id]), $page->name, ['alt' => $page->name]) !!}</td>
                        <td>{{ $page->alias }}</td>
                        <td>{{ $page->text }}</td>
                        <td>{{ $page->cteated_at }}</td>
                        <td>
                            {!! Form::open(['url' => route('page_edit', ['page' => $page->id]), 'class' => 'form-horizontal', 'method' => 'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
    {!! Html::link(route('page_add'), 'New page', ['alt' => 'new_page']) !!}
</div>