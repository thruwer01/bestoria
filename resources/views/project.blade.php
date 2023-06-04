<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Верстка</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
</head>
<body>
<div class="flats-main-block">
    <div class="search-block">
        <div class="sort-wrapper">
            <select class="sort_select" id="sortSelectel">
                <option value="">Порядок: по умолчанию</option>
                <option value="+price">Цена: по возрастанию</option>
                <option value="-price">Цена: по убыванию</option>
                <option value="+squere">Площадь: по возрастанию</option>
                <option value="-squere">Площадь: по убыванию</option>
            </select>
        </div>
    </div>
    <div class="wrapper">
        <div class="filters" id="filters">
            {{-- комнатность, цена, площадь, корпус, этаж, секция, с отделкой и без --}}
            <div class="filter-block">
                <div class="filter-name">
                    Комнаты
                </div>
                <div class="filter-content" id="filter-rooms">
                </div>
            </div>
            <div class="filter-block">
                <div class="filter-name">
                    Цена
                </div>
                <div class="filter-content" id="filter-price">
                    <input type="text" class="price-range-slider">
                    <div class="range-inputs" id="priceInputs">
                        <input type="text" data-update="from" id="priceMin">
                        <span>—</span>
                        <input type="text" data-update="to" id="priceMax">
                    </div>
                </div>
            </div>
            <div class="filter-block">
                <div class="filter-name">
                    Площадь
                </div>
                <div class="filter-content" id="filter-squere">
                    <input type="text" class="squere-range-slider">
                    <div class="range-inputs" id="squereInputs">
                        <input type="text" data-update="from" id="squereMin">
                        <span>—</span>
                        <input type="text" data-update="to" id="squereMax">
                    </div>
                </div>
            </div>
            <div class="filter-block">
                <div class="filter-name">
                    Этаж
                </div>
                <div class="filter-content" id="filter-floor">
                    <input type="text" class="floor-range-slider">
                    <div class="range-inputs" id="floorInputs">
                        <input type="text" data-update="from" id="floorMin">
                        <span>—</span>
                        <input type="text" data-update="to" id="floorMax">
                    </div>
                </div>
            </div>
            <div class="filter-block">
                <div class="filter-name">
                    Корпус
                </div>
                <div class="filter-content" id="filter-frame">
                </div>
            </div>
            {{-- <div class="filter-block">
                <div class="filter-name">
                    Секция
                </div>
                <div class="filter-content" id="filter-section">
                </div>
            </div> --}}
            <div class="filter-block">
                <div class="filter-name">
                    Отделка
                </div>
                <div class="filter-content" id="filter-finishing">
                </div>
            </div>
            <div class="filters-button" id="filterBtns">
                <button class="show-filter" id="showFilterBtn">Показать</button>
                <a href="#" id="clearFilter">&#10006; сбросить фильтр</a>
            </div>
        </div>
        <div class="flats" id="flats">
        </div>
    </div>
    <div class="page-numbers-wrapper">
        <div class="page-numbers">
            <ul id="pageNumbers">
            </ul>
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
        position: sticky;
        top: 0;
        background-color:#E8E9E8;
        padding: 20px;
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
        padding: 30px 30px 30px 30px;
        margin-right: 30px;
        position: sticky;
        top: 10%;
        height: 500px;
        overflow-y: scroll;
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
        margin-bottom: 50px;
        max-width: 31%;
    }
    .flat-block img {
        max-height: 280px;
        min-height: 280px;
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
        margin-bottom: 35px;
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
    .page-numbers-wrapper {
        width: 100%;
        margin-bottom: 20px;
    }
    .page-numbers {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .page-numbers ul {
        display: flex;
        max-width: 30%;
        list-style-type: none;
    }
    .page-numbers ul li {
        padding: 4px 12px;
        border-radius: 5px;
        opacity: .4;
        cursor: pointer;
    }
    .page-numbers ul li:hover {
        color: #333 !important;
        opacity: 1;
        background-color: #DCDCDC;
    }
    .page-numbers ul li.disable:hover {
        background-color: #E8E9E8 !important;
        opacity: .4;
    }
    .page-numbers ul li.active {
        color: #333;
        border: 1px solid #333;
        opacity: 1;
    }
    /* RANGE SLIDER */
    .irs-bar {
        background-color: #770219!important;
    }
    .irs--round .irs-bar {
        top: 34px !important;
    }
    .irs--round .irs-handle {
        border: 2px solid #C1C1C1!important;
        width: 20px;
        height: 20px;
        box-shadow: none;
    }
    .range-inputs {
        margin-top: 3%;
        display: flex;
        justify-content: space-between;
    }
    .range-inputs input {
        max-width: 44%;
        outline: none;
        border: 1px #ddd solid;
        background-color: #f8f8f8;
        box-sizing: border-box;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    /* Filter BTN */
    .filters-button {
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    .filters-button a{
        text-decoration: none;
        font-size: 12px;
        padding: 5px;
        color: #770219;
    }
    .filters-button button {
        outline: none;
        background-color: #770219;
        border: 1px solid #770219;
        color: white;
        cursor: pointer;
        padding: 5px 15px;
    }
</style>

</body>
</html>
