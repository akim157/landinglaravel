<div style="margin:0px 50px 0px 50px;">
    @isset($services)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Текст</th>
                <th>Иконки</th>
                <th>Дата создания</th>

                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{!! Html::link(route('service_edit', ['service' => $service->id]), $service->name, ['alt' => $service->name]) !!}</td>
                    <td>{{ $service->text }}</td>
                    <td>{{ $service->icon }}</td>
                    <td>
                        {!! Form::open(['url' => route('service_edit', ['service' => $service->id]), 'class' => 'form-horizontal', 'method' => 'POST']) !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endisset
    {!! Html::link(route('service_add'), 'New service', ['alt' => 'new_service']) !!}
</div>