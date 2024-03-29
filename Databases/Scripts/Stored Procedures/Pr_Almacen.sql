USE [galerasw_galeras]
GO
/****** Object:  StoredProcedure [dbo].[Pr_Almacen]    Script Date: 28/10/2023 10:43:59 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
Create procedure [dbo].[Pr_Almacen]
@producto Varchar(50)
As
Declare @consulta As NVarChar(4000)


Set @consulta  = 'Select nombre_almacen,contenido_piezas_total_almacen, nombre_tipo_pieza
				  cantidad_piezas_almacen, nombre_sesion
				  From dbo.almacen
				  Inner Join almacen_tipo On id_tipo_piezas = fk_id_tipo_piezas_almacen
				  Inner Join cuentas On id_cuenta = fk_id_tipo_cuentas'

if @producto <> ''
Begin
  Set @consulta = @consulta+' Where nombre_almacen Like '''+ @producto +'%'' '
End

Exec sp_executesql @consulta

