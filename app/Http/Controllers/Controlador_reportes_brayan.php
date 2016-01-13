<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
class Controlador_reportes_brayan extends Controller
{
    public  function promocion_venta_volumen_online(Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $promotions = DB::select("select \"DimPromotion\".\"SpanishPromotionName\",
        count (\"FactInternetSales\".\"PromotionKey\")  from \"FactInternetSales\" natural join \"DimPromotion\", \"DimDate\"
        where \"DimPromotion\".\"EnglishPromotionType\"='Volume Discount' and \"FactInternetSales\".\"PromotionKey\" != 1 and \"DimDate\".\"DateKey\" = \"FactInternetSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimPromotion\".\"SpanishPromotionName\")
        order by  count (\"FactInternetSales\".\"PromotionKey\")  desc");
        return response()->json($promotions);
    }

    public  function promocion_venta_volumen_reseller(Request $request)
    {
        $inicio = $request::input('inicio')."-01" ;
        $fin = $request::input('fin') ;
        $fecha = explode ("-",$fin);
        $ultimo_dia = $this->getUltimoDiaMes($fecha[0],$fecha[1]);
        $fin = $fin."-".$ultimo_dia;
        $promotions = DB::select("select \"DimPromotion\".\"SpanishPromotionName\",
        count (\"FactResellerSales\".\"PromotionKey\")  from \"FactResellerSales\" natural join \"DimPromotion\", \"DimDate\"
        where \"DimPromotion\".\"EnglishPromotionType\"='Volume Discount' and \"FactResellerSales\".\"PromotionKey\" != 1 and \"DimDate\".\"DateKey\" = \"FactResellerSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimPromotion\".\"SpanishPromotionName\")
        order by  count (\"FactResellerSales\".\"PromotionKey\")  desc");
        return response()->json($promotions);
    }



    public  function paises_reseller(Request $request)
    {
        $inicio = $request::input('inicio');
        $fin = $request::input('fin') ;
        $promotions = DB::select("select \"DimSalesTerritory\".\"SalesTerritoryCountry\",
        count (\"FactResellerSales\".\"SalesTerritoryKey\")  from \"FactResellerSales\" natural join \"DimSalesTerritory\", \"DimDate\"
        where \"DimDate\".\"DateKey\" = \"FactResellerSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimSalesTerritory\".\"SalesTerritoryCountry\")
        order by  count (\"FactResellerSales\".\"SalesTerritoryKey\")  desc");
        return response()->json($promotions);
    }


    public  function paises_online(Request $request)
    {
        $inicio = $request::input('inicio');
        $fin = $request::input('fin') ;
        $promotions = DB::select("select \"DimSalesTerritory\".\"SalesTerritoryCountry\",
        count (\"FactInternetSales\".\"SalesTerritoryKey\")  from \"FactInternetSales\" natural join \"DimSalesTerritory\", \"DimDate\"
        where \"DimDate\".\"DateKey\" = \"FactInternetSales\".\"OrderDateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimSalesTerritory\".\"SalesTerritoryCountry\")
        order by  count (\"FactInternetSales\".\"SalesTerritoryKey\")  desc");
        return response()->json($promotions);
    }

    public  function productos_no_venden(Request $request)
    {
        $inicio = $request::input('inicio');
        $fin = $request::input('fin') ;
        $promotions = DB::select("select \"DimProduct\".\"SpanishProductName\",
        avg (\"FactProductInventory\".\"UnitsBalance\")  from \"FactProductInventory\" natural join \"DimProduct\", \"DimDate\"
        where \"DimDate\".\"DateKey\" = \"FactProductInventory\".\"DateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimProduct\".\"SpanishProductName\")
        order by  avg (\"FactProductInventory\".\"UnitsBalance\")  desc limit 7");
        return response()->json($promotions);
    }

    public function presupuesto_dpto(Request $request)
    {
        $inicio = $request::input('inicio');
        $fin = $request::input('fin') ;
        $promotions = DB::select("select \"DimDepartmentGroup\".\"DepartmentGroupName\",
        avg (\"FactFinance\".\"Amount\")  from \"FactFinance\" natural join \"DimDepartmentGroup\", \"DimDate\"
        where \"DimDate\".\"DateKey\" = \"FactFinance\".\"DateKey\"
        and \"DimDate\".\"FullDateAlternateKey\" between '$inicio' and  '$fin'
        group by (\"DimDepartmentGroup\".\"DepartmentGroupName\")
        order by  avg (\"FactFinance\".\"Amount\")  desc");
        return response()->json($promotions);
    }



    function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }
}
