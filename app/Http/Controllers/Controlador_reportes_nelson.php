<?php
/**
 * Created by PhpStorm.
 * User: Nelson
 */
namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class Controlador_reportes_nelson extends Controller{
    public function ventas_por_promocion(Request $request)
    {
        $promotion = DB::query('select "DimPromotion"."SpanishPromotionName", count ("FactInternetSales"."PromotionKey")
	                          from "FactInternetSales" natural join "DimPromotion"
		                      where "FactInternetSales"."PromotionKey" !=1
		                      group by ("DimPromotion"."SpanishPromotionName")
		                      order by  count ("FactInternetSales"."PromotionKey") desc');
        return response()->json($promotion);
    }

    public function ventas_por_producto(Request $request)
    {
        $product = DB::query('select "DimProduct"."EnglishProductName", count ("FactInternetSales"."ProductKey")
                                    from "FactInternetSales" natural join "DimProduct"
	                                group by ("DimProduct"."EnglishProductName")
	                                order by  count ("FactInternetSales"."ProductKey") desc');
        return response()->json($product);
    }
}

