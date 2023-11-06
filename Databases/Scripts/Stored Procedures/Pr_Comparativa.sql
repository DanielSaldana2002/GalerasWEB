USE [galerasw_galeras]
GO
CREATE PROCEDURE [dbo].[Pr_Comparativa]
@Categoria As Varchar(45),
@Producto1 As Varchar(50),
@Producto2 As Varchar(50)
As
Begin
  Declare @consulta As NVarChar(Max)

  Set @consulta = N'Select nombre_categoria, nombre_producto, precio, Count(fk_id_producto_p) as TotalVentas
					From dbo.productos
					Inner Join dbo.categoria_productos On id_categoria = fk_id_categoria
					Inner Join dbo.tickets_pedidos On id_productos = fk_id_producto_p
					Where nombre_categoria = '''+ @Categoria +''' And nombre_producto = '''+ @Producto1 +'''
					Group By nombre_categoria, nombre_producto, precio
					Union All
					Select nombre_categoria, nombre_producto, precio, Count(fk_id_producto_p) as TotalVentas
					From dbo.productos
					Inner Join dbo.categoria_productos On id_categoria = fk_id_categoria
					Inner Join dbo.tickets_pedidos On id_productos = fk_id_producto_p
					Where nombre_categoria = '''+ @Categoria +''' And nombre_producto = '''+ @Producto2 +'''
					Group By nombre_categoria, nombre_producto, precio'

  Exec sp_executesql @consulta 

End;