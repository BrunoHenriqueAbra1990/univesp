
<script>
	$(document).ready(function() {
		var table = $('#table.display').DataTable( {
		initComplete: function () {
			this.api().columns().every( function () {
			var column = this;
			var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
				.on( 'change', function () {
				var val = $.fn.dataTable.util.escapeRegex(
					$(this).val()
				);

				column
					.search( val ? '^'+val+'$' : '', true, false )
					.draw();
				} );
	
			column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 12,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
				{
					extend: 'copy',
					text: '<i class="fa fa-copy"></i>',
					className: 'btn btn-default',
				},

				{
					extend: 'print',
					text: '<i class="fa fa-print"></i>',
					className: 'btn btn-default',
				},

				{
					extend: 'excelHtml5',
					text: '<i class="fa fa-file-excel"></i>',
					className: 'btn btn-default'
				},

				{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "300px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},


			scrollCollapse: true,
			paging:         false,
		});

	} );

	
	$(document).ready(function() {
		var table = $('#select.display').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 12,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
			
			{
				extend: 'copy',
				text: '<i class="fa fa-copy"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel"></i>',
				className: 'btn btn-default'
			},

			{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "400px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},


			scrollCollapse: true,
			paging:         false,
		});
		
		
		$('#select.display tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
		
	} );	
	
	$(document).ready(function() {
		var table = $('#select_fixed.display').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 50,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
			
			{
				extend: 'copy',
				text: '<i class="fa fa-copy"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel"></i>',
				className: 'btn btn-default'
			},

			{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "400px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},

			fixedColumns:   {
				leftColumns: 1
			},

			scrollCollapse: true,
			paging:         false,
		});
		
		$('#select_fixed.display tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
	} );
	
	$(document).ready(function() {
		var table = $('#select_fixed_usuarios.display').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 50,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
			
			{
				extend: 'copy',
				text: '<i class="fa fa-copy"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel"></i>',
				className: 'btn btn-default'
			},

			{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "350px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},
/*
			fixedColumns:   {
				leftColumns: 1
			},
*/
			scrollCollapse: true,
			paging:         false,
		});
		
		$('#select_fixed_usuarios.display tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
	} );
	
	$(document).ready(function() {
		var table = $('#select_fixed_fornecedores.display').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 50,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
			
			{
				extend: 'copy',
				text: '<i class="fa fa-copy"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel"></i>',
				className: 'btn btn-default'
			},

			{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "350px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},

			fixedColumns:   {
				leftColumns: 1
			},

			scrollCollapse: true,
			paging:         false,
		});
		
		$('#select_fixed_fornecedores.display tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
	} );

	$(document).ready(function() {
		var table = $('#select_fixed_cotacao.display').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 50,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
			
			{
				extend: 'copy',
				text: '<i class="fa fa-copy"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel"></i>',
				className: 'btn btn-default'
			},

			{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "350px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},
/*
			fixedColumns:   {
				leftColumns: 1
			},
*/
			scrollCollapse: true,
			paging:         false,
		});
		
		$('#select_fixed_cotacao.display tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
	} );
	
	$(document).ready(function() {
		var table = $('#select_fixed_produtos.display').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 50,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
			
			{
				extend: 'copy',
				text: '<i class="fa fa-copy"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel"></i>',
				className: 'btn btn-default'
			},

			{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "350px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},
/*
			fixedColumns:   {
				leftColumns: 1
			},
*/
			scrollCollapse: true,
			paging:         false,
		});
		
		$('#select_fixed_produtos.display tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
	} );
	
	$(document).ready(function() {
		var table = $('#select_fixed_cotacao_final.display').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 50,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
			
			{
				extend: 'copy',
				text: '<i class="fa fa-copy"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel"></i>',
				className: 'btn btn-default'
			},

			{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "350px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},
/*
			fixedColumns:   {
				leftColumns: 1
			},
*/
			scrollCollapse: true,
			paging:         false,
		});
		
		$('#select_fixed_cotacao_final.display tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
	} );
		
	$(document).ready(function() {
		var table = $('#select_modal.display').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},

			iDisplayLength: 12,
			bPaginate: true,
			bInfo: true,
			bFilter: true,
			"bAutoWidth": false,
			"bRetrieve": true,
			"bDestroy": true,
			"oLanguage": {
				"sEmptyTable":     "Nenhum registro encontrado na tabela",
				"sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
				"sLoadingRecords": "Carregando...",
				"sProcessing":     "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar: ",
				"oPaginate": {
					"sNext": "Proximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast":"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},

			dom: 'Bfrtip',

			buttons: [
			
			{
				extend: 'copy',
				text: '<i class="fa fa-copy"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				className: 'btn btn-default',
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel"></i>',
				className: 'btn btn-default'
			},

			{
					extend: 'colvis',
					collectionLayout: 'fixed four-column',
					text: 'Visualização'
				},

				{
					extend: 'colvisGroup',
					text: 'Mostrar tudo',
					show: ':hidden'
				}
			],
			
			scrollY:        "400px",
			scrollX:        true,

			fixedHeader: {
				header: false,
				footer: false
			},


			scrollCollapse: true,
			paging:         false,
		});
		
		
		$('#select_modal.display tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
		
	} );



</script>