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
//Ventas por ano agrupadas
    public function ventas_por_ano_agrupada(Request $request)
    {
        $product = DB::query('select "DimDate"."CalendarYear", count ("FactInternetSales"."OrderDateKey")
	                            from "FactInternetSales","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey"
                                group by ("DimDate"."CalendarYear")
                                order by count  ("FactInternetSales"."OrderDateKey")');
        return response()->json($product);
    }

//Ventas por ano especifico
    public function ventas_por_ano_especifico(Request $request)
    {
        $product = DB::query('select "DimDate"."CalendarYear", count ("FactInternetSales"."OrderDateKey")
                                from "FactInternetSales","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey" and "CalendarYear"=2011
                                group by ("DimDate"."CalendarYear")');
        return response()->json($product);
    }

//Ventas por mes *Enero *año 2011
    public function ventas_por_mes_especifico(Request $request)
    {
        $product = DB::query('select "DimDate"."SpanishMonthName", count ("FactInternetSales"."OrderDateKey")
                                from "FactInternetSales","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey" and  "SpanishMonthName"=\'Enero\' and "CalendarYear"=2011
                                group by ("DimDate"."SpanishMonthName")');
        return response()->json($product);
    }

//--Ventas por mes *Enero agrupadas por año
    public function ventas_por_mes_agrupado(Request $request)
    {
        $product = DB::query('select "DimDate"."CalendarYear", count ("FactInternetSales"."OrderDateKey")
                                from "FactInternetSales","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey" and  "SpanishMonthName"=\'Enero\'
                                group by ("DimDate"."CalendarYear")
                                order by count  ("FactInternetSales"."OrderDateKey")');
        return response()->json($product);
    }

//Ventas por Trimestre *1 agrupadas por año
    public function ventas_por_trimestre_agrupado(Request $request)
    {
        $product = DB::query('select "DimDate"."CalendarYear", count ("FactInternetSales"."OrderDateKey")
                                from "FactInternetSales","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey" and  "CalendarQuarter"=1
                                group by ("DimDate"."CalendarYear")
                                order by ("DimDate"."CalendarYear") ');
        return response()->json($product);
    }

//Ventas por Trimestre *1 año especifico
    public function ventas_por_trimestre_especifico(Request $request)
    {
        $product = DB::query('select "DimDate"."CalendarYear", count ("FactInternetSales"."OrderDateKey")
                                from "FactInternetSales","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey" and  "CalendarQuarter"=1 and "CalendarYear"=2011
                                group by ("DimDate"."CalendarYear")');
        return response()->json($product);
    }
//Ventas por Semestre *2 agrupadas por año
    public function ventas_por_semestre_agrupado(Request $request)
    {
        $product = DB::query('select "DimDate"."CalendarYear", count ("FactInternetSales"."OrderDateKey")
                                from "FactInternetSales","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey" and  "CalendarSemester"=2
                                group by ("DimDate"."CalendarYear")
                                order by ("DimDate"."CalendarYear")');
        return response()->json($product);
    }
//Ventas por Semestre *2 año especifico
    public function ventas_por_semestre_especifico(Request $request)
    {
        $product = DB::query('select "DimDate"."CalendarYear", count ("FactInternetSales"."OrderDateKey")
                                from "FactInternetSales","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey" and  "CalendarSemester"=2 and "CalendarYear"=2010
                                group by ("DimDate"."CalendarYear")');
        return response()->json($product);
    }

//Ventas por producto Agrupados por año
    public function ventas_por_producto_agrupado(Request $request)
    {
        $product = DB::query('select "DimProduct"."EnglishProductName", "DimDate"."CalendarYear", count ("FactInternetSales"."ProductKey")
                                from "FactInternetSales" natural join "DimProduct","DimDate"
                                where "FactInternetSales"."OrderDateKey"="DimDate"."DateKey"
                                group by ("DimProduct"."EnglishProductName"), ("DimDate"."CalendarYear")
                                order by  "DimProduct"."EnglishProductName";');
        return response()->json($product);
    }

//Llamadas al callcenter dias Laborales vs Dias Festivos
    public function callcenter_laboral_vs_festivos(Request $request)
    {
        $product = DB::query('select "FactCallCenter"."WageType", count ("FactCallCenter"."DateKey")
                                from "FactCallCenter" natural join "DimDate"
                                group by ("FactCallCenter"."WageType")
                                order by  count ("FactCallCenter"."DateKey");');
        return response()->json($product);
    }

}

