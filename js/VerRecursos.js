function abrirRecurso(Tipo,Detalle) {
	if(Tipo == 1)
	{
      window.open(Detalle, '_blank');
	}
	else
	{
		//alert(Detalle);
		var url = "http://ic-itcr.ac.cr/~fcoto/SAC/uploads/"
		window.open(url.concat(Detalle), '_blank');
	}
}