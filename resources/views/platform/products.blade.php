
@section('content')
    <div class="container">
        <h1>Список товаров</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Название</th>
                <th>Калибр</th>
                <th>Тип крепления</th>
                <th>Материал корпуса</th>
                <th>Материал первой камеры</th>
                <th>Количество камер</th>
                <th>Снижение звукового давления</th>
                <th>Ресурс</th>
                <th>Покрытие</th>
                <th>Описание</th>
                <th>Изображение</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->caliber }}</td>
                    <td>{{ $product->mount_type }}</td>
                    <td>{{ $product->body_material }}</td>
                    <td>{{ $product->first_chamber_material }}</td>
                    <td>{{ $product->chamber_count }}</td>
                    <td>{{ $product->sound_reduction }}</td>
                    <td>{{ $product->lifespan }}</td>
                    <td>{{ $product->coating }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50" height="50">
                        @else
                            <span class="text-muted">Нет изображения</span>
                        @endif
                    </td>
{{--                    <td>--}}
{{--                        <a href="{{ route('platform.resources.weapons.edit', $product->id) }}" class="btn btn-warning btn-sm">Редактировать</a>--}}
{{--                        <form action="{{ route('platform.resources.weapons.destroy', $product->id) }}" method="POST" style="display:inline-block;">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">Удалить</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
