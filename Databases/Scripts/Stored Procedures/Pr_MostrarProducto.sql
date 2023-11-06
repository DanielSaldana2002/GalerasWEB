USE [galerasw_galeras]
GO
CREATE PROCEDURE [dbo].[Pr_MostrarProducto]
@Categoria As Varchar(50) 
As
Begin
  Declare @consulta As NVarChar(Max)

  Set @consulta = N'Select id_productos, nombre_producto, precio 
				    From dbo.categoria_productos
				    Inner Join dbo.productos On id_categoria = fk_id_categoria
				    Where nombre_categoria = '''+ @Categoria +''''

  Exec sp_executesql @consulta 

End;


