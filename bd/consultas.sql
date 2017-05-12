SELECT x.pk_almacen, x.fk_sucursal, y.sucursal 
FROM almacen x, sucursal y
WHERE x.fk_sucursal = y.pk_sucursal