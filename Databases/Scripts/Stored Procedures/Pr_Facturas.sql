USE [galerasw_galeras]
GO
/****** Object:  StoredProcedure [dbo].[Pr_Facturas]    Script Date: 30/10/2023 05:50:17 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER procedure [dbo].[Pr_Facturas]
@FechaInicial As Date,
@FechaFinal   As Date
As

Declare @consulta As NVarChar(4000)

Set @FechaInicial = CONVERT(DateTime, @FechaInicial)
Set @FechaFinal   = CONVERT(DateTime, @FechaFinal)


Set @consulta  = 'Select nombre_factura, apellido_p_factura, apellido_m_factura, Lower(rfc) As rfc, correo_electronico, fecha_expedicion
				  From dbo.factura
				  Inner Join dbo.tickets On id_tickets = fk_id_tickets_factura'

if @FechaInicial <> ''
Begin
  Set @consulta = @consulta+' Where fecha_expedicion >= '''+ CONVERT(NVARCHAR, @FechaInicial) +''''
  If @FechaFinal <> ''
  Begin
    Set @consulta = @consulta+' And fecha_expedicion <= '''+ CONVERT(NVARCHAR,@FechaFinal) +''''
  End
End
Else
Begin
    If @FechaFinal <> ''
    Begin
      Set @consulta = @consulta+' Where fecha_expedicion <= '''+ CONVERT(NVARCHAR,@FechaFinal) +''''
    End
End

Exec sp_executesql @consulta

