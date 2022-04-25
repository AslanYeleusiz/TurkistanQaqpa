@extends('layouts.layout')

@section('header')
<div class="menu">
    <a href="{{route('layout')}}">
        <div class="menuFilterBlock alignCenter">Назад</div>
    </a>
</div>
@endsection

@section('main')

<div class="row g-5">

    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Изменить запись</h4>
        <form method="post" action="{{ route('redact-form-id', $item->id) }}" class="needs-validation" validate="" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Названия</label>
                    <input type="text" class="form-control" id="name" placeholder="" value="{{$item->name}}" required="" name="name">
                    <div class="invalid-feedback">
                        Введите названия!
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="" value="{{$item->price}}" required="">
                    <div class="invalid-feedback">
                        Введите цену!
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="h" class="form-label">Высота</label>
                    <input type="text" class="form-control" id="h" name="height" placeholder="" value="{{$item->height}}" required="">
                    <div class="invalid-feedback">
                        Введите высоту!
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="w" class="form-label">Ширина</label>
                    <input type="text" class="form-control" id="w" name="width" placeholder="" value="{{$item->width}}" required="">
                    <div class="invalid-feedback">
                        Введите ширину!
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="type-w" class="form-label mr-2 mt-3">Тип ширины</label>
                    <select class="form-select" id="type-w" name="widthType" required="">
                        <option>{{$item->widthType}}</option>
                        <option>Стандартный</option>
                        <option>Низкий</option>
                        <option>Средний</option>
                        <option>Высокий</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="ptime" class="form-label mr-2">Время подготовки</label>
                    <select class="form-select" id="ptime" name="timepreparty" required="">
                        <option>{{$item->timepreparty}}</option>
                        <option>2-3</option>
                        <option>5-10</option>
                        <option>10-15</option>
                        <option>15-20</option>
                        <option>20-25</option>
                        <option>25-30</option>
                    </select>
                    <span>дней</span>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="delivery" id="same-delivery">
                        @if($item->delivery==1)
                        <input type="checkbox" class="form-check-input" name="delivery" id="same-delivery" checked>
                        @else
                        <input type="checkbox" class="form-check-input" name="delivery" id="same-delivery">
                        @endif
                        <label class="form-check-label" for="same-delivery">Доставка БЕСПЛАТНАЯ</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        @if($item->install==1)<input type="checkbox" class="form-check-input" name="install" id="same-install" checked>
                        @else
                        <input type="checkbox" class="form-check-input" name="install" id="same-install">
                        @endif
                        <label class="form-check-label" for="same-install">Установка БЕСПЛАТНАЯ</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mt-2">
                        <input type="file" name="image">
                        <span class="mt-1">(Не обезательно)</span>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-gray btn-lg" type="submit">Сохранить запись</button>


        </form>

        <form action="{{route('delete-form-id', $item->id)}}" method="get">
            <button class="w-100 mt-2 btn btn-danger btn-lg" type="submit">Удалить запись</button>
        </form>
    </div>


</div>


@endsection
