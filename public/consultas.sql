
/**
- monedas más usadas con vendedores
select "DimCurrency"."CurrencyName",
        count ("FactResellerSales"."CurrencyKey")  from "FactResellerSales" natural join "DimCurrency", "DimDate"
        where   "DimDate"."DateKey" = "FactResellerSales"."OrderDateKey"
        and "DimDate"."FullDateAlternateKey" between '2012-01-01' and  '2012-01-31'
        group by ("DimCurrency"."CurrencyName")
        order by  count ("FactResellerSales"."CurrencyKey")  desc limit 7

- monedas más usadas on-line
select "DimCurrency"."CurrencyName",
        count ("FactInternetSales"."CurrencyKey")  from "FactInternetSales" natural join "DimCurrency", "DimDate"
        where   "DimDate"."DateKey" = "FactInternetSales"."OrderDateKey"
        and "DimDate"."FullDateAlternateKey" between '2012-01-01' and  '2012-01-31'
        group by ("DimCurrency"."CurrencyName")
        order by  count ("FactInternetSales"."CurrencyKey")  desc limit 7

- mejores promociones con vendedores
select "DimPromotion"."SpanishPromotionName",
        count ("FactResellerSales"."PromotionKey")  from "FactResellerSales" natural join "DimPromotion", "DimDate"
        where "FactResellerSales"."PromotionKey" != 1 and "DimDate"."DateKey" = "FactResellerSales"."OrderDateKey"
        and "DimDate"."FullDateAlternateKey" between '$2012-01-01' and  '$2012-01-31'
        group by ("DimPromotion"."SpanishPromotionName")
        order by  count ("FactResellerSales"."PromotionKey")  desc limit 5

- mejores promociones en internet 
select "DimPromotion"."SpanishPromotionName",
        count ("FactInternetSales"."PromotionKey")  from "FactInternetSales" natural join "DimPromotion", "DimDate"
        where "FactInternetSales"."PromotionKey" != 1 and "DimDate"."DateKey" = "FactInternetSales"."OrderDateKey"
        and "DimDate"."FullDateAlternateKey" between '2012-01-01' and  '2012-01-31'
        group by ("DimPromotion"."SpanishPromotionName")
        order by  count ("FactInternetSales"."PromotionKey")  desc

        
- comparativo de ventas
select  "DimDate"."MonthNumberOfYear" as month, sum ("FactResellerSales"."SalesAmount") as ventas, 'vendedores' as tipo
        from "FactResellerSales", "DimDate"
        where   "DimDate"."DateKey" = "FactResellerSales"."OrderDateKey"
        and "DimDate"."FullDateAlternateKey" between '2011-01-01' and '2011-12-31'
        group by  month
	Union 
	select "DimDate"."MonthNumberOfYear" as month, sum ("FactInternetSales"."SalesAmount") as ventas,'on-line' as  tipo from "FactInternetSales", "DimDate"
        where   "DimDate"."DateKey" = "FactInternetSales"."OrderDateKey"
        and "DimDate"."FullDateAlternateKey" between '2011-01-01' and '2011-12-31'
        group by month

       order by  month  

- cuentas que mas mueven dinero
select cuentas."AccountDescription" as descripcion,sum (abs (finanzas."Amount")) as movimiento from 
"FactFinance" as finanzas natural join "DimAccount" as cuentas 
natural join  "DimDate" as fecha
where  fecha."FullDateAlternateKey" between '2010-01-01' and '2011-01-01'
group by descripcion order by movimiento desc limit 7

-departamentos que mas mueven dinero
select departamento."DepartmentGroupName" as nombre_dpto,
        sum (abs (finanzas."Amount")) as movimiento from
        "FactFinance" as finanzas natural join 
        "DimDepartmentGroup" as departamento natural join "DimDate" as fecha
        where  fecha."FullDateAlternateKey" between '2010-01-01' and '2011-01-01'
        group by nombre_dpto order by movimiento desc limit 7

**/