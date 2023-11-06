USE [galerasw_galeras]
GO

/****** Object:  View [dbo].[VW_CorteVentaDiaHoy]    Script Date: 28/10/2023 10:21:33 a. m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


CREATE VIEW [dbo].[VW_CorteVentaDiaHoy] AS
Select id_tickets, total, fecha_pago_final, pagado, nombre_empleado, id_mesas, nombre_sesion, facturado 
From dbo.tickets
Inner Join dbo.empleados On fk_id_empleados = id_empleado
Inner Join dbo.mesas On fk_id_mesas = id_mesas
Inner Join dbo.cuentas On fk_id_cuentas_t = id_cuenta
Where fecha_pago_final >= CONVERT(Date, GETDATE())

GO


