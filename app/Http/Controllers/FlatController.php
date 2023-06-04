<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class FlatController extends Controller
{

    public $flats;

    private function xmlHelperDecode(string $xml)
    {
        return json_decode(json_encode(simplexml_load_string($xml,null,LIBXML_NOCDATA)));
    }

    public function getFlats()
    {
        $xml = Http::get(env('HTTP_REQUEST_LINK'));
        $response = $this->xmlHelperDecode($xml);

        $this->flats = $response->shop->offers->offer;
    }

    public function createFlats()
    {
        $this->getFlats();
        Flat::truncate();

        $flatsWithOutPicture = [];

        foreach ($this->flats as $flat)
        {
            if (!isset($flat?->picture))
            {
                $flat->picture = "https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-4.png";
                array_push($flatsWithOutPicture, $flat->{'@attributes'}->id);
            }

            Flat::create([
                "name" => $flat->name,
                "price" => (int)$flat->price,
                "picture_link" => $flat->picture,
                "description" => $flat->description,
                "frame" => (int)$flat->param[0],
                "section" => (int)$flat->param[2],
                "floor" => (int)$flat->param[3],
                "apart_number" => (int)$flat->param[4],
                "squere" => (float)$flat->param[6],
                "rooms" => (int)$flat->param[7],
                "finishing" => (boolean)$flat?->param[8]
            ]);
        }
        // dd($flatsWithOutPicture);
    }

    public function apiShow(Request $request)
    {
        $priceFrom = (int)$request->price_from;
        $priceTo = (int)$request->price_to;
        $perPage = (int)$request->per_page;
        $squereFrom = (float)$request->squere_from;
        $squereTo = (float)$request->squere_to;
        $floorFrom = (int)$request->floor_from;
        $floorTo = (int)$request->floor_to;

        $filters = [
            AllowedFilter::exact("frame"), //корпус
            AllowedFilter::exact("section"), //секция
            AllowedFilter::exact("floor"), //этаж
            AllowedFilter::exact("rooms"), //комнаты
            AllowedFilter::exact("finishing"), //отделка
        ];

        $flats = QueryBuilder::for(Flat::class)
            ->allowedFilters($filters)
            ->allowedSorts(["price", "squere"])
            ->where('price', ">=", $priceFrom)
            ->where('price', "<=", $priceTo)
            ->where('squere', ">=", $squereFrom)
            ->where('squere', "<=", $squereTo)
            ->where('floor', ">=", $floorFrom)
            ->where('floor', "<=", $floorTo);

        $flatsData = $flats->get();
        $filtersData = [
            "min_squere" => $flatsData->pluck('squere')->min(),
            "max_squere" => $flatsData->pluck('squere')->max(),
            "min_price" => $flatsData->pluck('price')->min(),
            "max_price" => $flatsData->pluck('price')->max(),
            "min_floor" => $flatsData->pluck('floor')->min(),
            "max_floor" => $flatsData->pluck('floor')->max(),

            "rooms" => $flatsData->pluck('rooms')->unique()->toArray(),
            "frame" => $flatsData->pluck('frame')->unique()->toArray(),
            "section" => $flatsData->pluck('section')->unique()->toArray(),
        ];

        $response['data'] = $flats->paginate($perPage);
        $response['filterData'] = $filtersData;

        return $response;
    }
}
