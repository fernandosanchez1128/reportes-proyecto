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
    public  function mejores_promociones(Request $request)
    {
        $promotions = DB::select('select "DimPromotion"."SpanishPromotionName", count ("FactInternetSales"."PromotionKey")  from "FactInternetSales" natural join "DimPromotion"  where "FactInternetSales"."PromotionKey" !=1  group by ("DimPromotion"."SpanishPromotionName") order by  count ("FactInternetSales"."PromotionKey") desc');
        return response()->json($promotions);


    }
}