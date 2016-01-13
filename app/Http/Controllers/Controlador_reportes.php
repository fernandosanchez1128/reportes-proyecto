<?php
/**
 * Created by PhpStorm.
 * User: JuanDiego
 * Date: 12/01/2016
 * Time: 10:37 PM
 */

namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
class Controlador_reportes extends Controller
{
    public  function ventas_productos_subcategorias (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $categories = DB::select("select \"DimProductCategory\".\"SpanishProductCategoryName\",
        sum(\"FactInternetSales\".\"ExtendedAmount\") from \"FactInternetSales\" natural join \"DimProduct\" natural join \"DimProductSubcategory\"
        natural join \"DimProductCategory\" where \"FactInternetSales\".\"OrderDateKey\" in (select \"DimDate\".\"DateKey\" from \"DimDate\"
        where \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin')
        group by (\"DimProductCategory\".\"SpanishProductCategoryName\")");
        return response()->json($categories);
    }
}