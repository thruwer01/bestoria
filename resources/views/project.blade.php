<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Верстка</title>
    <script src="script.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
</head>
<body>
<div class="flats-main-block">
    <div class="search-block">
        <div class="search-wrapper">
            <input type="text" class="search_input" placeholder="Поиск">
            <button type="submit" class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="15px" height="15px"><path fill="#999" d="M 19 3 C 13.488281 3 9 7.488281 9 13 C 9 15.394531 9.839844 17.589844 11.25 19.3125 L 3.28125 27.28125 L 4.71875 28.71875 L 12.6875 20.75 C 14.410156 22.160156 16.605469 23 19 23 C 24.511719 23 29 18.511719 29 13 C 29 7.488281 24.511719 3 19 3 Z M 19 5 C 23.429688 5 27 8.570313 27 13 C 27 17.429688 23.429688 21 19 21 C 14.570313 21 11 17.429688 11 13 C 11 8.570313 14.570313 5 19 5 Z"/></svg>
            </button>
        </div>
        <div class="sort-wrapper">
            <select class="sort_select">
                <option>Порядок: по умолчанию</option>
            </select>
        </div>
    </div>
    <div class="wrapper">
        <div class="filters">
            {{-- комнатность, цена, площадь, корпус, этаж, секция, с отделкой и без --}}
            <div class="filter-block">
                <div class="filter-name">
                    Комнаты
                </div>
                <div class="filter-content">
                    @for ($a = 1; $a <= 4; $a++)
                    <div class="filter-option">
                        <div class="filter-checkbox">
                            <input type="checkbox" class="filter-checkbox" id="checkbox{{$a}}">
                        </div>
                        <div class="filter-label unselectable">
                            <label for="checkbox{{$a}}">{{$a}}-комнатные</label>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="flats">
            @for ($i = 0; $i < 20; $i++)
                <div class="flat-block">
                    <a href="#" style="text-decoration: none;">
                        <img src="https://static.tildacdn.com/stor6134-6261-4531-b633-383039656435/51412289.svg">
                        <div class="flat-main-info">
                            <div class="flat-name">
                                4-комнатная квартира, 124.8 м²
                            </div>
                            <div class="flat-price">
                                {{ number_format("55568107", 0, " ", " ")}} р.
                            </div>
                            <div class="flat-info">
                                <span>38 этаж</span>
                                <span>126.2 м²</span>
                                <span>445 746 ₽/м²</span>
                            </div>
                            <div class="flat-button">
                                <button href="">Подробнее</button>
                            </div>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </div>
</div>

<style>
    @font-face {
        font-family: "VelaSans";
        font-style: normal;
        font-weight: 400;
        src: local("VelaSans"),
            url("/fonts/VelaSans-Regular.woff2") format("woff2"),
            url("/fonts/VelaSans-Regular.woff") format("woff");
    }
    @font-face {
        font-family: "VelaSans";
        font-style: normal;
        font-weight: 600;
        src: local("VelaSans"),
            url("/fonts/VelaSans-Medium.woff2") format("woff2"),
            url("/fonts/VelaSans-Medium.woff") format("woff");
    }
    @font-face {
        font-family: "VelaSans";
        font-style: normal;
        font-weight: 80;
        src: local("VelaSans"),
            url("/fonts/VelaSans-Bold.woff2") format("woff2"),
            url("/fonts/VelaSans-Bold.woff") format("woff");
    }

    * {
        margin: 0;
        padding: 0;
        font-family: 'VelaSans';
    }
    body {
        background-color: #E8E9E8;
    }
    .unselectable {
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none;   /* Chrome/Safari/Opera */
        -khtml-user-select: none;    /* Konqueror */
        -moz-user-select: none;      /* Firefox */
        -ms-user-select: none;       /* Internet Explorer/Edge */
        user-select: none;
    }
    .flats-main-block {
        margin: 0 2%;
        margin-top: 150px;
        width: 96%;
    }
    .search-block {
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-end;
    }
    .search-wrapper {
        position: relative;
    }
    .search-icon {
        position: absolute;
        right: 0;
        top: 3px;
        outline: none;
        border: none;
        border-left: 1px solid #ddd;
        background: none;
        height: 20px;
        cursor: pointer;
    }
    .search-icon svg {
        padding: 2px 5px;
        color: #ddd;
    }
    .sort-wrapper {
        margin-left: 20px;
    }
    .wrapper {
        display: flex;
    }
    .filters {
        width: 20%;
        background-color: #E0E0E0;
        height: 100%;
        padding: 30px 0 30px 30px;
        margin-right: 30px;
    }
    .flats {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
    }
    .flat-block {
        flex-grow: 1;
        height: auto;
        margin-left: 20px;
        margin-bottom: 30px;
    }
    .flat-name {
        color: #26262b;
        font-size: 20px;
        font-weight: 600;
        margin-top: 5px;
    }
    .flat-price {
        color: #770219;
        font-size: 20px;
        font-weight: 600;
        margin-top: 16px;
    }
    .flat-info {
        margin-top: 15px;
        font-size: 16px;
        font-weight: 400;
        display: flex;
        justify-content: space-between;
        color: #26262b;
    }
    .flat-button {
        margin-top: 20px;
    }
    .flat-button button {
        color: #ffffff;
        background-color: #26262b;
        border-radius: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        font-size: 13px;
        padding: 8px 15px;
        cursor: pointer;
        transition: background-color 0.5s;
        outline: none;
        border: none;
    }
    .flat-button button:hover {
        background-color: #770219 !important;
    }
    input.search_input {
        border: 1px #ddd solid;
        background: #f8f8f8;
        border-radius: 3px;
        color: #000;
        box-sizing: border-box;
        -webkit-appearance: none;
        -moz-appearance: none;
        outline: 0;
        padding: 2px 30px 2px 10px;
    }
    select.sort_select {
        border: 1px #ddd solid;
        background: #f8f8f8;
        color: #000;
        box-sizing: border-box;
        cursor: pointer;
        padding: 2px 30px 2px 10px;
        border-radius: 3px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: 0;
    }
    .sort-wrapper {
        position: relative;
    }
    .sort-wrapper:after {
        content: "";
        position: absolute;
        right: 7px;
        top: 10px;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #333;
    }
    /* FILTERS */
    .filter-block {
        font-size: 12px;
    }
    .filter-block .filter-name {
        color: #770219;
    }
    .filter-block .filter-option {
        display: flex;
    }
    .filter-option {
        margin: 5px 0px;
    }
    .filter-option .filter-label {
        margin-left: 10px;
    }
    .filter-label label, .filter-checkbox input{
        cursor: pointer;
    }
</style>

</body>
</html>
