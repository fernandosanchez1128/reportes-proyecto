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
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $promotion = DB::select("select \"DimPromotion\".\"SpanishPromotionName\", count (\"FactInternetSales\".\"PromotionKey\")
	    from \"FactInternetSales\" natural join \"DimPromotion\", \"DimDate\"
		where \"FactInternetSales\".\"PromotionKey\" != 1 and \"FactInternetSales\".\"OrderDateKey\" = \"DimDate\".\"DateKey\"
		and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
		group by (\"DimPromotion\".\"SpanishPromotionName\")
        order by  count (\"FactInternetSales\".\"PromotionKey\")  desc");

        return response()->json($promotion);
    }

    public function ventas_por_producto(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $product = DB::select("select prodsub.\"EnglishProductSubcategoryName\", count (prodsub.\"ProductSubcategoryKey\")
	from \"FactInternetSales\" ins natural join \"DimProduct\" prod natural join \"DimProductSubcategory\" prodsub ,\"DimDate\" dt
	where ins.\"OrderDateKey\"=dt.\"DateKey\" and \"FullDateAlternateKey\" between '$inicio' and  '$fin'
	group by (prodsub.\"EnglishProductSubcategoryName\")
	order by  count (prodsub.\"ProductSubcategoryKey\")");
        return response()->json($product);
    }

//Ventas por ano especifico_internet
    public function ventas_por_ano_especifico(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $product = DB::select("select \"DimDate\".\"CalendarYear\", count (\"FactInternetSales\".\"OrderDateKey\")
	from \"FactInternetSales\",\"DimDate\"
	where \"FactInternetSales\".\"OrderDateKey\"=\"DimDate\".\"DateKey\" and \"CalendarYear\" between '$inicio' and '$fin'
	group by (\"DimDate\".\"CalendarYear\")
	order by (\"DimDate\".\"CalendarYear\") asc");
        return response()->json($product);
    }

    //Ventas por ano especifico_vendedores
    public function ventas_por_ano_especifico_vendedores(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $product = DB::select("select \"DimDate\".\"CalendarYear\", count (\"FactResellerSales\".\"OrderDateKey\")
	from \"FactResellerSales\",\"DimDate\"
	where \"FactResellerSales\".\"OrderDateKey\"=\"DimDate\".\"DateKey\" and \"CalendarYear\" between '$inicio' and '$fin'
	group by (\"DimDate\".\"CalendarYear\")
	order by (\"DimDate\".\"CalendarYear\") asc");
        return response()->json($product);
    }

//Ventas por mes *Enero *año 2011
    public function ventas_por_mes_especifico(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $product = DB::select("select \"DimDate\".\"MonthNumberOfYear\", count (\"FactInternetSales\".\"OrderDateKey\")
	from \"FactInternetSales\",\"DimDate\"
	where \"FactInternetSales\".\"OrderDateKey\"=\"DimDate\".\"DateKey\" and  \"CalendarYear\"=$inicio
	group by (\"DimDate\".\"MonthNumberOfYear\")
	order by  (\"DimDate\".\"MonthNumberOfYear\")");
        return response()->json($product);
    }

    public function ventas_por_mes_especifico_vendedores(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $product = DB::select("select \"DimDate\".\"MonthNumberOfYear\", count (\"FactResellerSales\".\"OrderDateKey\")
	from \"FactResellerSales\",\"DimDate\"
	where \"FactResellerSales\".\"OrderDateKey\"=\"DimDate\".\"DateKey\" and  \"CalendarYear\"=$inicio
	group by (\"DimDate\".\"MonthNumberOfYear\")
	order by  (\"DimDate\".\"MonthNumberOfYear\")");
        return response()->json($product);
    }


//Ventas por Trimestre *1 agrupadas por año
    public function ventas_por_trimestre_agrupado(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $product = DB::select("select \"DimDate\".\"CalendarQuarter\", count (\"FactInternetSales\".\"OrderDateKey\")
	from \"FactInternetSales\",\"DimDate\"
	where \"FactInternetSales\".\"OrderDateKey\"=\"DimDate\".\"DateKey\"  and \"CalendarYear\"=$inicio
	group by (\"DimDate\".\"CalendarQuarter\")
	order by (\"DimDate\".\"CalendarQuarter\") ");
        return response()->json($product);
    }

    public function ventas_por_trimestre_agrupado_vendedores(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $product = DB::select("select \"DimDate\".\"CalendarQuarter\", count (\"FactResellerSales\".\"OrderDateKey\")
	from \"FactResellerSales\",\"DimDate\"
	where \"FactResellerSales\".\"OrderDateKey\"=\"DimDate\".\"DateKey\"  and \"CalendarYear\"=$inicio
	group by (\"DimDate\".\"CalendarQuarter\")
	order by (\"DimDate\".\"CalendarQuarter\") ");
        return response()->json($product);
    }

//Ventas por Semestre *2 agrupadas por año
    public function ventas_por_semestre_agrupado(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $product = DB::select("select \"DimDate\".\"CalendarSemester\", count (\"FactInternetSales\".\"OrderDateKey\")
	from \"FactInternetSales\",\"DimDate\"
	where \"FactInternetSales\".\"OrderDateKey\"=\"DimDate\".\"DateKey\" and  \"CalendarYear\"=$inicio
	group by (\"DimDate\".\"CalendarSemester\")
	order by (\"DimDate\".\"CalendarSemester\")");
        return response()->json($product);
    }
    public function ventas_por_semestre_agrupado_vendedores(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $product = DB::select("select \"DimDate\".\"CalendarSemester\", count (\"FactResellerSales\".\"OrderDateKey\")
	from \"FactResellerSales\",\"DimDate\"
	where \"FactResellerSales\".\"OrderDateKey\"=\"DimDate\".\"DateKey\" and  \"CalendarYear\"=$inicio
	group by (\"DimDate\".\"CalendarSemester\")
	order by (\"DimDate\".\"CalendarSemester\")");
        return response()->json($product);
    }
//********************************************************************************************
//Ventas por producto Agrupados por año
    public function ventas_internet_por_producto_agrupado_ano(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $product = DB::select("select prodsub.\"EnglishProductSubcategoryName\", count (prodsub.\"ProductSubcategoryKey\")
	from \"FactInternetSales\" ins natural join \"DimProduct\" prod natural join \"DimProductSubcategory\" prodsub ,\"DimDate\" dt
	where ins.\"OrderDateKey\"=dt.\"DateKey\" and \"CalendarYear\" = $inicio
	group by (prodsub.\"EnglishProductSubcategoryName\")
	order by  prodsub.\"EnglishProductSubcategoryName\"");
        return response()->json($product);
    }
    public function ventas_vendedores_por_producto_agrupado_ano(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $product = DB::select("select prodsub.\"EnglishProductSubcategoryName\", count (prodsub.\"ProductSubcategoryKey\")
	from \"FactResellerSales\" ins natural join \"DimProduct\" prod natural join \"DimProductSubcategory\" prodsub ,\"DimDate\" dt
	where ins.\"OrderDateKey\"=dt.\"DateKey\" and \"CalendarYear\" = $inicio
	group by (prodsub.\"EnglishProductSubcategoryName\")
	order by  prodsub.\"EnglishProductSubcategoryName\"");
        return response()->json($product);
    }

    //Ventas por producto Agrupados por mes y año
    public function ventas_internet_por_producto_agrupado_mes(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $product = DB::select("select prodsub.\"EnglishProductSubcategoryName\", count (prodsub.\"ProductSubcategoryKey\")
	from \"FactInternetSales\" ins natural join \"DimProduct\" prod natural join \"DimProductSubcategory\" prodsub ,\"DimDate\" dt
	where ins.\"OrderDateKey\"=dt.\"DateKey\" and \"MonthNumberOfYear\" = $inicio and  \"CalendarYear\" = $fin
	group by (prodsub.\"EnglishProductSubcategoryName\")
	order by  prodsub.\"EnglishProductSubcategoryName\"");
        return response()->json($product);
    }
    public function ventas_vendedores_por_producto_agrupado_mes(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $product = DB::select("select prodsub.\"EnglishProductSubcategoryName\", count (prodsub.\"ProductSubcategoryKey\")
	from \"FactResellerSales\" ins natural join \"DimProduct\" prod natural join \"DimProductSubcategory\" prodsub ,\"DimDate\" dt
	where ins.\"OrderDateKey\"=dt.\"DateKey\" and \"MonthNumberOfYear\" = $inicio and  \"CalendarYear\" = $fin
	group by (prodsub.\"EnglishProductSubcategoryName\")
	order by  prodsub.\"EnglishProductSubcategoryName\"");
        return response()->json($product);
    }

    //Ventas por producto Agrupados por rango
    public function ventas_internet_por_producto_agrupado_rango(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $product = DB::select("select prodsub.\"EnglishProductSubcategoryName\", count (prodsub.\"ProductSubcategoryKey\")
	from \"FactInternetSales\" ins natural join \"DimProduct\" prod natural join \"DimProductSubcategory\" prodsub ,\"DimDate\" dt
	where ins.\"OrderDateKey\"=dt.\"DateKey\" and \"FullDateAlternateKey\" between '$inicio' and  '$fin'
	group by (prodsub.\"EnglishProductSubcategoryName\")
	order by  prodsub.\"EnglishProductSubcategoryName\"");
        return response()->json($product);
    }
    public function ventas_vendedores_por_producto_agrupado_rango(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $product = DB::select("select prodsub.\"EnglishProductSubcategoryName\", count (prodsub.\"ProductSubcategoryKey\")
	from \"FactResellerSales\" ins natural join \"DimProduct\" prod natural join \"DimProductSubcategory\" prodsub ,\"DimDate\" dt
	where ins.\"OrderDateKey\"=dt.\"DateKey\" and \"FullDateAlternateKey\" between '$inicio' and  '$fin'
	group by (prodsub.\"EnglishProductSubcategoryName\")
	order by  prodsub.\"EnglishProductSubcategoryName\"");
        return response()->json($product);
    }




//Llamadas al callcenter dias Laborales vs Dias Festivos
    public function callcenter_laboral_vs_festivos(Request $request)
    {
        $inicio = $request::input('inicio') ;
        $fin = $request::input('fin') ;
        $product = DB::select("select \"FactCallCenter\".\"WageType\", sum(\"Calls\")
from \"FactCallCenter\" natural join \"DimDate\"
where \"DimDate\".\"FullDateAlternateKey\" between  '$inicio' and  '$fin'
group by \"FactCallCenter\".\"WageType\"");
        return response()->json($product);
    }

}

