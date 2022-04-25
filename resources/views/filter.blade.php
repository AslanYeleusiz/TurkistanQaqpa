@extends('layouts.layout')
@section('header')
<div class="menu">
    @guest
    <img class="phoneIcon" src="{{ URL::asset('public/imgs/phone.png') }}" alt="">
    <p class="phoneNum">+7 771 144-58-08<br>+7 707 936-06-96</p>
    <a href="#" onclick="history.back();">
        <div class="menuFilterBlock alignCenter">Назад</div>
    </a>
    @else

    <a href="{{route('logout')}}" onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();">
        <div class="menuFilterBlock alignCenter">Выйти</div>
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
<div class="filter">
    <span>Фильтр по ценам </span>

        <a href="{{route('filterEnt', [$start=210000,$finish=400000])}}">
            <p>от 210 000 до 400 000 ₸</p>
        </a>
        <a href="{{route('filterEnt', [$start=400000,$finish=850000])}}">
            <p>от 400 000 до 850 000 ₸</p>
        </a>
        <a href="{{route('filterEnt', [$start=850000,$finish=2000000])}}">
            <p>от 850 000 до 2 000 000 ₸</p>
        </a>

</div>
@endsection

@section('footer')
<footer>
    <div class="container">
        <div class="f_head">
            <img class="f_logo" src="{{ URL::asset('public/imgs/TurkistanQaqpaMONO.png') }}">
            <div class="f_socNetwork">
                <img src="imgs/WhatsApp.png" alt="">
                <img src="imgs/Instagram.png" alt="">
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
