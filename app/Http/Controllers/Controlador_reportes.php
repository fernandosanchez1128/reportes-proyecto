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
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
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
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $promotions = DB::select("select \"DimPromotion\".\"SpanishPromotionName\",
        count (\"FactResellerSales\".\"PromotionKey\")  from \"FactResellerSales\" natural join \"DimPromotion\", \"DimDate\"
        where \"FactResellerSales\".\"PromotionKey\" != 1 and \"DimDate\".\"DateKey\" = \"FactResellerSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimPromotion\".\"SpanishPromotionName\")
        order by  count (\"FactResellerSales\".\"PromotionKey\")  desc limit 5");

        return response()->json($promotions);
    }

    public  function monedas_online (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $monedas = DB::select("select \"DimCurrency\".\"CurrencyName\",
        count (\"FactInternetSales\".\"CurrencyKey\")  from \"FactInternetSales\" natural join \"DimCurrency\", \"DimDate\"
        where   \"DimDate\".\"DateKey\" = \"FactInternetSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimCurrency\".\"CurrencyName\")
        order by  count (\"FactInternetSales\".\"CurrencyKey\")  desc limit 7");

        return response()->json($monedas);
    }

    public  function monedas_vendedores (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $monedas = DB::select("select \"DimCurrency\".\"CurrencyName\",
        count (\"FactResellerSales\".\"CurrencyKey\")  from \"FactResellerSales\" natural join \"DimCurrency\", \"DimDate\"
        where   \"DimDate\".\"DateKey\" = \"FactResellerSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimCurrency\".\"CurrencyName\")
        order by  count (\"FactResellerSales\".\"CurrencyKey\")  desc limit 7");

        return response()->json($monedas);
    }



    function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }
    public  function comparativo_ventas (Request $request)
    {
        $year = $request::input('inicio');


        $ventas = DB::select("select  \"DimDate\".\"MonthNumberOfYear\" as month, sum (\"FactResellerSales\".\"SalesAmount\") as ventas, 'vendedores' as tipo
        from \"FactResellerSales\", \"DimDate\"
        where   \"DimDate\".\"DateKey\" = \"FactResellerSales\".\"OrderDateKey\"
        and \"DimDate\".\"CalendarYear\" = '$year'
        group by  month
	Union
	select \"DimDate\".\"MonthNumberOfYear\" as month, sum (\"FactInternetSales\".\"SalesAmount\") as ventas,'on-line' as  tipo from \"FactInternetSales\", \"DimDate\"
        where   \"DimDate\".\"DateKey\" = \"FactInternetSales\".\"OrderDateKey\"
        and \"DimDate\".\"CalendarYear\" = '$year'
        group by month

       order by  month   ");

        return response()->json($ventas);
    }

    public function movimiento_cuentas (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $cuentas=  DB::select("select cuentas.\"AccountDescription\" as descripcion,
        sum (abs (finanzas.\"Amount\")) as movimiento from
        \"FactFinance\" as finanzas natural join \"DimAccount\" as cuentas
        natural join \"DimDate\" as fecha
        where  fecha.\"FullDateAlternateKey\" between '$inicio' and '$fin'
        group by descripcion order by movimiento desc limit 7");

        return response()->json($cuentas);
    }

    public function movimiento_dptos (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $dptos=  DB::select("select departamento.\"DepartmentGroupName\" as nombre_dpto,
        sum (abs (finanzas.\"Amount\")) as movimiento from
        \"FactFinance\" as finanzas natural join
        \"DimDepartmentGroup\" as departamento natural join \"DimDate\" as fecha
        where  fecha.\"FullDateAlternateKey\" between '$inicio' and '$fin'
        group by nombre_dpto order by movimiento desc limit 7");

        return response()->json($dptos);
    }

    public function mvto_inventario (Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin= $request::input('fin');
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $productos=  DB::select("SELECT producto.\"ProductAlternateKey\", producto.\"EnglishProductName\" as name FROM \"DimProduct\" as producto
        WHERE producto.\"ProductAlternateKey\" NOT IN
        (SELECT producto.\"ProductAlternateKey\"
        FROM \"FactProductInventory\" as inventario Natural Join  \"DimProduct\" as producto
          Natural Join \"DimDate\" as fecha
          where fecha.\"FullDateAlternateKey\" between '$inicio' and '$fin'
          and inventario.\"UnitsOut\" > 0 )");

        return response()->json($productos);
    }



}
