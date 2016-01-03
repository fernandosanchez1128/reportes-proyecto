<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
class Controlador_reportes_brayan extends Controller
{
    public  function promocion_venta_volumen(Request $request)
    {
        $promotion = DB::query('SELECT count(*), dim."PromotionKey"  FROM "FactInternetSales" AS fact , "DimPromotion" AS dim WHERE dim."PromotionKey"=fact."PromotionKey" and dim."EnglishPromotionType"=\'Volume Discount\' GROUP BY dim."PromotionKey" ');
        return response()->json($promotion);
    }
}
