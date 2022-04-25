@extends('layouts.layout')
@section('header')
<div class="menu">
    @guest
    <img class="phoneIcon" src="{{ URL::asset('public/imgs/phone.png') }}" alt="">
    <p class="phoneNum"><a href="tel:+77711445808">+7 771 144-58-08</a><br><a href="+77079360696">+7 707 936-06-96</a></p>
    <a href="{{route('filter')}}">
        <div class="menuFilterBlock alignCenter">Фильтр</div>
    </a>
    @else

    <a href="{{route('logout')}}" onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-left logout"></i>
        <div class="menuFilterBlock alignCenter logoutBtn">Выйти</div>
    </a>
    <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">
        @csrf
    </form>

    <a href="{{route('adminPanel')}}">
        <div class="menuFilterBlock alignCenter">Создать запись</div>
    </a>

    @endguest

</div>
@endsection

@section('main')

<div class="row">
    <div class="col-md">
        @foreach($data as $el)
        @if($loop->index %2 == 0)
        <div class="productBlock">
            <img src="{{ URL::asset('public/storage/'.$el->imageUrl) }}" class="pr_Img" alt="{{$el->imageUrl}}">
            <div class="pr_name">«<span id="n">{{$el->name}}</span>» <span id="t">{{$el->price}}</span> ₸</div>
            <div class="pr_info">Высота: <span id="h">{{$el->height}}</span> м <br>
                Ширина: <span id="w">{{$el->width}}</span> м (<span id="type-w">{{$el->widthType}}</span> размер) <br>
                Время подготовки: <span id="d">{{$el->timepreparty}}</span> дней <br>
                Цвет: По желанию клиента <br>
                Доставка: <span id="del">@if($el->delivery==1)БЕСПЛАТНАЯ
                    @else ПЛАТНАЯ@endif</span> <br>
                Установка: <span id="i">@if($el->install==1)БЕСПЛАТНАЯ
                    @else ПЛАТНАЯ@endif</span></div>
            <div class="btns">
                <button id="more" class="btn cst-btn">Подробнее</button>
                @guest
                <button id="order" class="btn cst-btn">Заказать <img class="whatsupIcon" src="{{ URL::asset('public/imgs/Vector.png') }}" alt=""></button>
                @else
                <a href="{{route('setItem', $el->id)}}"><button id="order" class="btn cst-btn">Изменить</button></a>
                @endguest
            </div>
        </div>

        @endif
        @endforeach
    </div>
    <div class="col-md">
        @foreach($data as $el)
        @if($loop->index %2 == 1)
        <div class="productBlock">
            <img src="{{ URL::asset('public/storage/'.$el->imageUrl) }}" class="pr_Img">
            <div class="pr_name">«<span id="n">{{$el->name}}</span>» <span id="t">{{$el->price}}</span> ₸</div>
            <div class="pr_info">Высота: <span id="h">{{$el->height}}</span> м <br>
                Ширина: <span id="w">{{$el->width}}</span> м (<span id="type-w">{{$el->widthType}}</span> размер) <br>
                Время подготовки: <span id="d">{{$el->timepreparty}}</span> дней <br>
                Цвет: По желанию клиента <br>
                Доставка: <span id="del">@if($el->delivery==1)БЕСПЛАТНАЯ
                    @else ПЛАТНАЯ@endif</span> <br>
                Установка: <span id="i">@if($el->install==1)БЕСПЛАТНАЯ
                    @else ПЛАТНАЯ@endif</span></div>
            <div class="btns">
                <button id="more" class="btn cst-btn">Подробнее</button>
                @guest
                <button id="order" class="btn cst-btn">Заказать <img class="whatsupIcon" src="{{ URL::asset('public/imgs/Vector.png') }}" alt=""></button>
                @else
                <a href="{{route('setItem', $el->id)}}"><button id="order" class="btn cst-btn">Изменить</button></a>
                @endguest
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
<div class="pageBlock alignCenter">
    <div class="pageNav">
        @if($page==1)
        <i class="bi bi-arrow-left-circle-fill b_left active"></i>
        @else
        <a href="{{route('setPage',$page-1)}}"><i class="bi bi-arrow-left-circle-fill b_left"></i></a>
        @endif
        <div class="numeric">
            @for ($i = 1; $i < $dataItems/12+1; $i++) @if($i==$page) <a href="{{route('setPage',$i)}}"><span class="active">{{$i}}</span></a>

                @else
                <a href="{{route('setPage',$i)}}"><span>{{$i}}</span></a>
                @endif

                @endfor
        </div>
        @if($page>=$dataItems/12)
        <i class="bi bi-arrow-right-circle-fill b_right active"></i>
        @else
        <a href="{{route('setPage',$page+1)}}"><i class="bi bi-arrow-right-circle-fill b_right"></i></a>
        @endif

    </div>
</div>

@endsection



@section('footer')
<footer>
    <div class="container">
        <div class="f_head">
            <img class="f_logo" src="{{ URL::asset('public/imgs/TurkistanQaqpaMONO.png') }}">
            <div class="f_socNetwork">
                <img src="{{ URL::asset('public/imgs/WhatsApp.png') }}" alt="">
                <img src="{{ URL::asset('public/imgs/Instagram.png') }}" alt="">
            </div>
        </div>
        <div class="f_item">
            <img src="{{ URL::asset('public/imgs/footerPhon.png') }}">
            <p>+7 771 144-58-08 <br>+7 707 936-06-96</p>
        </div>
        <div class="f_item">
            <img src="{{ URL::asset('public/imgs/footerPlace.png') }}">
            <p>г. Туркестан <br>ул. Жарылкапова (Возле Maxi дом)</p>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="f_item">
            <p>©2022 Все права защищены <br>Сайт разработан компанией Peaksoft.kz</p>
        </div>
    </div>
</footer>
@endsection
