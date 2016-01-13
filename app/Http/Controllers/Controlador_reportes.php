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
    public  function ventas_productos_categorias_internet (Request $request)
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

    public  function ventas_productos_categorias_reseller (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $categories = DB::select("select \"DimProductCategory\".\"SpanishProductCategoryName\",
        sum(\"FactResellerSales\".\"ExtendedAmount\") from \"FactResellerSales\" natural join \"DimProduct\" natural join \"DimProductSubcategory\"
        natural join \"DimProductCategory\" where \"FactResellerSales\".\"OrderDateKey\" in (select \"DimDate\".\"DateKey\" from \"DimDate\"
        where \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin')
        group by (\"DimProductCategory\".\"SpanishProductCategoryName\")");
        return response()->json($categories);
    }

    public  function llamadas_sumallamadas (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $calls = DB::select("select \"Shift\", sum(\"Calls\") from \"FactCallCenter\" where \"FactCallCenter\".\"DateKey\" in
        (select \"DimDate\".\"DateKey\" from \"DimDate\" where \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin')
        and \"FactCallCenter\".\"WageType\"='weekday'
        group by (\"FactCallCenter\".\"Shift\")");
        return response()->json($calls);
    }

    public  function llamadas_sumarespuestas (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $calls = DB::select("select \"Shift\", sum(\"AutomaticResponses\") from \"FactCallCenter\" where \"FactCallCenter\".\"DateKey\" in
        (select \"DimDate\".\"DateKey\" from \"DimDate\" where \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin')
        and \"FactCallCenter\".\"WageType\"='weekday'
        group by (\"FactCallCenter\".\"Shift\")");
        return response()->json($calls);
    }

    public  function llamadas_sumaordenes (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $calls = DB::select("select \"Shift\", sum(\"Orders\") from \"FactCallCenter\" where \"FactCallCenter\".\"DateKey\" in
        (select \"DimDate\".\"DateKey\" from \"DimDate\" where \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin')
        and \"FactCallCenter\".\"WageType\"='weekday'
        group by (\"FactCallCenter\".\"Shift\")");
        return response()->json($calls);
    }

    public  function llamadas_sumaissues (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $calls = DB::select("select \"Shift\", sum(\"IssuesRaised\") from \"FactCallCenter\" where \"FactCallCenter\".\"DateKey\" in
        (select \"DimDate\".\"DateKey\" from \"DimDate\" where \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin')
        and \"FactCallCenter\".\"WageType\"='weekday'
        group by (\"FactCallCenter\".\"Shift\")");
        return response()->json($calls);
    }

    public  function mayores_compradores (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $calls = DB::select("select sum(\"FactInternetSales\".\"ExtendedAmount\") as \"TotalComprado\", \"DimCustomer\".\"BirthDate\", \"DimGeography\".\"SpanishCountryRegionName\",
        \"DimCustomer\".\"MaritalStatus\", \"DimCustomer\".\"Gender\", \"DimCustomer\".\"YearlyIncome\",
        \"DimCustomer\".\"TotalChildren\", \"DimCustomer\".\"SpanishOccupation\", \"DimCustomer\".\"SpanishEducation\" from \"FactInternetSales\" natural join \"DimCustomer\" natural join \"DimGeography\" where \"FactInternetSales\".\"OrderDateKey\" in
        (select \"DimDate\".\"DateKey\" from \"DimDate\" where \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin')
        group by \"DimCustomer\".\"CustomerKey\", \"DimGeography\".\"SpanishCountryRegionName\"
        order by \"TotalComprado\" desc limit 10");
        return response()->json($calls);
    }

    function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }
}