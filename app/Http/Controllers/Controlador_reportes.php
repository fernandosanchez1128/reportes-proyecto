<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 14/12/2015
 * Time: 19:44
 */

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
class Controlador_reportes extends Controller
{
    public  function mejores_promociones_online (Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $promotions = DB::select("select \"DimPromotion\".\"SpanishPromotionName\",
        count (\"FactInternetSales\".\"PromotionKey\")  from \"FactInternetSales\" natural join \"DimPromotion\", \"DimDate\"
        where \"FactInternetSales\".\"PromotionKey\" != 1 and \"DimDate\".\"DateKey\" = \"FactInternetSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimPromotion\".\"SpanishPromotionName\")
        order by  count (\"FactInternetSales\".\"PromotionKey\")  desc");

        return response()->json($promotions);
    }

    public  function mejores_promociones_vendedores (Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $promotions = DB::select("select \"DimPromotion\".\"SpanishPromotionName\",
        count (\"FactResellerSales\".\"PromotionKey\")  from \"FactResellerSales\" natural join \"DimPromotion\", \"DimDate\"
        where \"FactResellerSales\".\"PromotionKey\" != 1 and \"DimDate\".\"DateKey\" = \"FactResellerSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimPromotion\".\"SpanishPromotionName\")
        order by  count (\"FactResellerSales\".\"PromotionKey\")  desc");

        return response()->json($promotions);
    }

    public  function monedas_online (Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $monedas = DB::select("select \"DimCurrency\".\"CurrencyName\",
        count (\"FactInternetSales\".\"CurrencyKey\")  from \"FactInternetSales\" natural join \"DimCurrency\", \"DimDate\"
        where   \"DimDate\".\"DateKey\" = \"FactInternetSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimCurrency\".\"CurrencyName\")
        order by  count (\"FactInternetSales\".\"CurrencyKey\")  desc");

        return response()->json($monedas);
    }
}
