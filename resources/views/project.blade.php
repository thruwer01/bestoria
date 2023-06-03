<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Верстка</title>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>
<div class="flats-main-block">
    <div class="search-block">
        <div class="sort-wrapper">
            <select class="sort_select">
                <option>Порядок: по умолчанию</option>
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
                    <div class="filter-option">
                        <div class="filter-checkbox">
                            <input type="checkbox" class="filter-checkbox" id="checkbox{{$a}}">
                        </div>
                        <div class="filter-label unselectable">
                            <label for="checkbox{{$a}}">{{$a}}-комнатные</label>
                        </div>
                    </div>
                </div>
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
        padding: 30px 0 30px 30px;
        margin-right: 30px;
        position: sticky;
        top: 20%;
        height: 500px;
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
</style>

</body>
</html>
