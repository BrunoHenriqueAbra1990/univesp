
	//$(document).ready(function () {
	//	$('#telefone').mask('(00) 00000-0000');
	//});

	function Mudarestado(el) {
		console.log(el);
		var display = document.getElementById(el).style.display;
		if(display == "none"){
			document.getElementById(el).style.display = 'block';
			if(el == 'listarUsuarios'){
				console.log('Clicou em listarUsuarios');
				document.getElementById("listarUsuarios").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
				$.post('processa/Usuarios/index.php', function(retorna){
					$("#listarUsuarios").html(retorna);
				});
			}
			else if(el == 'listarFornecedores'){
				console.log('Clicou em listarFornecedores');
				document.getElementById("listarFornecedores").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
				$.post('processa/Fornecedores/index.php', function(retorna){
					$("#listarFornecedores").html(retorna);
				});
			}
			else if(el == 'listarProdutos'){
				console.log('Clicou em listarProdutos');
				document.getElementById("listarProdutos").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
				$.post('processa/Produtos/index.php', function(retorna){
					$("#listarProdutos").html(retorna);
				});
			}
			else if(el == 'listarCotacoes'){
				console.log('Clicou em listarCotacoes');
				document.getElementById("listarCotacoes").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
				$.post('processa/Cotacoes/index.php', function(retorna){
					$("#listarCotacoes").html(retorna);
				});
			}
			else if(el == 'listarEmpresas'){
				console.log('Clicou em listarEmpresas');
				document.getElementById("listarEmpresas").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
				$.post('processa/Empresas/index.php', function(retorna){
					$("#listarEmpresas").html(retorna);
				});
			}
		}
		else{
			document.getElementById(el).style.display = 'none';
		}
	}	

	//EXCLUIR DE DIVERSOS LUGARES
	function excluir(id, parametro) {
		var check = confirm("Deseja realmente excluir esse Registro.?");
		if (check === true) {
			console.log(id +' '+ parametro);
			$.ajax({
				url: 'bd/excluir_registro.php',
				method: 'POST',
				data: { ID: id, parametro: parametro }, // Seus parâmetros de atualização
				success: function(response) {
				  console.log(response);
					if(parametro === 'excluir_usuario'){
						document.getElementById("listarUsuarios").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
						$.post('processa/Usuarios/index.php', function(retorna){
							$("#listarUsuarios").html(retorna);
						});
					}

					if(parametro === 'excluir_produto'){
						document.getElementById("listarProdutos").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
						$.post('processa/Produtos/index.php', function(retorna){
							$("#listarProdutos").html(retorna);
						});
					}

					if(parametro === 'excluir_fornecedor'){
						document.getElementById("listarFornecedores").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
						$.post('processa/Fornecedores/index.php', function(retorna){
							$("#listarFornecedores").html(retorna);
						});
					}

					if(parametro === 'excluir_cotacao'){
						document.getElementById("listarCotacoes").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
						$.post('processa/Cotacoes/index.php', function(retorna){
							$("#listarCotacoes").html(retorna);
						});
					}
					
					if(parametro === 'excluir_empresa'){
						document.getElementById("listarEmpresas").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
						$.post('processa/Empresas/index.php', function(retorna){
							$("#listarEmpresas").html(retorna);
						});
					}
					
				},
				error: function(xhr, status, error) {
				  console.error('Erro na atualização dos dados:', error);
				}
			});
		}
	}


	async function visualizarRegistro(id, parametro){
		const modalVisualizar = new bootstrap.Modal(document.getElementById("modalVisualizar"));
		modalVisualizar.show();
		
		if(parametro === 'usuario'){
			document.getElementById("div_modal_visualizar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
			$.post('processa/Usuarios/div_modal_visualizar.php?ID='+id, function(retorna){
				$("#div_modal_visualizar").html(retorna);
			});
		}		
		if(parametro === 'produto'){
			document.getElementById("div_modal_visualizar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
			$.post('processa/Produtos/div_modal_visualizar.php?ID='+id, function(retorna){
				$("#div_modal_visualizar").html(retorna);
			});
		}		
		if(parametro === 'fornecedor'){
			document.getElementById("div_modal_visualizar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
			$.post('processa/Fornecedores/div_modal_visualizar.php?ID='+id, function(retorna){
				$("#div_modal_visualizar").html(retorna);
			});
		}		
		if(parametro === 'cotacao'){
			document.getElementById("div_modal_visualizar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
			$.post('processa/Cotacoes/div_modal_visualizar.php?ID='+id, function(retorna){
				$("#div_modal_visualizar").html(retorna);
			});
		}
		
		/*
		const dados = await fetch('bd/visualizar.php?id=' + id);
		const resposta = await dados.json();
		console.log(resposta);
		var ticket = resposta['dados'].ticket;
		document.getElementById("lbl_visualizar_ticket").innerText  =  ticket;
		*/
	}

	async function editarRegistro(id, parametro){
		const modalEditar = new bootstrap.Modal(document.getElementById("modalEditar"));
		modalEditar.show();
		
		document.getElementById("div_modal_editar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
		$.post('processa/div_modal_editar.php?Parametro='+parametro+'&Id='+id, function(retorna){
			$("#div_modal_editar").html(retorna);
		});
	}


	async function cadastrarRegistro(parametro){
		const modalCadastrar = new bootstrap.Modal(document.getElementById("modalCadastrar"));
		modalCadastrar.show();
		
		document.getElementById("div_modal_cadastrar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
		$.post('processa/div_modal_cadastrar.php?Parametro='+parametro, function(retorna){
			$("#div_modal_cadastrar").html(retorna);
		});
	}


	async function visualizarCotacao(cod_empresa, cod_cotacao){
		const modalCotacao = new bootstrap.Modal(document.getElementById("modalCotacao"));
		modalCotacao.show();
		
		document.getElementById("div_modal_cotacao").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../img/loading.gif' style='width:50px; heigth:50px'></img></div>";
		$.post('processa/Cotacoes/div_modal_cotacao.php?CodEmpresa='+cod_empresa+'&CodCotacao='+cod_cotacao, function(retorna){
			$("#div_modal_cotacao").html(retorna);
		});
	}



	$('#div_upload_usuarios').hide();		
	$('#div_upload_fornecedores').hide();		
	$('#div_upload_produtos').hide();		
	$('#div_upload_cotacao').hide();		
	$('#div_upload_empresas').hide();		
	$('#select_arquivo').change(function() {
		var select_arquivo = document.getElementById("select_arquivo").value;
		
		if(select_arquivo == 'Usuários'){
			$('#div_upload_usuarios').show();
			$('#div_upload_fornecedores').hide();
			$('#div_upload_produtos').hide();
			$('#div_upload_cotacao').hide();
			$('#div_upload_empresas').hide();
		}
		else if(select_arquivo == 'Fornecedores'){
			$('#div_upload_fornecedores').show();
			$('#div_upload_usuarios').hide();
			$('#div_upload_produtos').hide();
			$('#div_upload_cotacao').hide();
			$('#div_upload_empresas').hide();
		}
		else if(select_arquivo == 'Produtos'){
			$('#div_upload_produtos').show();
			$('#div_upload_fornecedores').hide();
			$('#div_upload_usuarios').hide();
			$('#div_upload_cotacao').hide();
			$('#div_upload_empresas').hide();
		}
		else if(select_arquivo == 'Cotação'){
			$('#div_upload_cotacao').show();
			$('#div_upload_produtos').hide();
			$('#div_upload_fornecedores').hide();
			$('#div_upload_usuarios').hide();
			$('#div_upload_empresas').hide();
		}
		else if(select_arquivo == 'Empresas'){
			$('#div_upload_empresas').show();
			$('#div_upload_cotacao').hide();
			$('#div_upload_produtos').hide();
			$('#div_upload_fornecedores').hide();
			$('#div_upload_usuarios').hide();
		}
		else{
			$('#div_upload_usuarios').hide();
			$('#div_upload_fornecedores').hide();
			$('#div_upload_produtos').hide();
			$('#div_upload_cotacao').hide();
			$('#div_upload_empresas').hide();
		}
	});


	function mascaraMutuario(o,f){
		v_obj=o
		v_fun=f
		setTimeout('execmascara()',1)
	}
	 
	function execmascara(){
		v_obj.value=v_fun(v_obj.value)
	}
	 
	function cpfCnpj(v){
	 
		//Remove tudo o que não é dígito
		v=v.replace(/\D/g,"")
	 
		if (v.length <= 11) { //CPF
			//Coloca um ponto entre o terceiro e o quarto dígitos
			v=v.replace(/(\d{3})(\d)/,"$1.$2")
	 
			//Coloca um ponto entre o terceiro e o quarto dígitos
			//de novo (para o segundo bloco de números)
			v=v.replace(/(\d{3})(\d)/,"$1.$2")
	 
			//Coloca um hífen entre o terceiro e o quarto dígitos
			v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
		} else { //CNPJ
			//Coloca ponto entre o segundo e o terceiro dígitos
			v=v.replace(/^(\d{2})(\d)/,"$1.$2")
	 
			//Coloca ponto entre o quinto e o sexto dígitos
			v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
	 
			//Coloca uma barra entre o oitavo e o nono dígitos
			v=v.replace(/\.(\d{3})(\d)/,".$1/$2") 
	 
			//Coloca um hífen depois do bloco de quatro dígitos
			v=v.replace(/(\d{4})(\d)/,"$1-$2")
		}
		return v
	}



	const formCadRegistro = document.getElementById("form-cad-registro");
	if (formCadRegistro) {
		formCadRegistro.addEventListener("submit", async(e) => {			
			e.preventDefault();
			const dadosForm = new FormData(formCadRegistro);
			console.log(dadosForm);
		
			document.getElementById("msgAlertaCadastrar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, salvando o registro!</div>";
			const dados = await fetch("bd/cadastrar_registros.php", {
				method: "POST",
				body: dadosForm
			});
			const resposta = await dados.json();
			console.log(resposta);
			
			if (resposta['status']) {
				document.getElementById("msgAlertaCadastrar").innerHTML = "";
				alert(resposta['msg']);
				formCadRegistro.reset();
				
				var cad_parametro 	= document.getElementById("cad_parametro").value;
				
				if(cad_parametro === 'USUARIO'){
					$.post('processa/Usuarios/index.php', function(retorna){
						$("#listarUsuarios").html(retorna);
					});
				}
				if(cad_parametro === 'PRODUTOS'){
					$.post('processa/Produtos/index.php', function(retorna){
						$("#listarProdutos").html(retorna);
					});
				}
				if(cad_parametro === 'FORNECEDORES'){
					$.post('processa/Fornecedores/index.php', function(retorna){
						$("#listarFornecedores").html(retorna);
					});
				}
				if(cad_parametro === 'EMPRESA'){
					$.post('processa/Empresas/index.php', function(retorna){
						$("#listarEmpresas").html(retorna);
					});
				}
			}else {
				document.getElementById("msgAlertaCadastrar").innerHTML = resposta['msg'];
			}
		});
	}


	const formEditRegistro = document.getElementById("form-edit-registro");
	if (formEditRegistro) {
		formEditRegistro.addEventListener("submit", async(e) => {			
			e.preventDefault();
			const dadosForm = new FormData(formEditRegistro);
			console.log(dadosForm);
		
			document.getElementById("msgAlertaEditar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, salvando o registro!</div>";
			const dados = await fetch("bd/editar_registros.php", {
				method: "POST",
				body: dadosForm
			});
			const resposta = await dados.json();
			console.log(resposta);
			
			if (resposta['status']) {
				document.getElementById("msgAlertaEditar").innerHTML = "";
				alert(resposta['msg']);
				
				var edit_parametro 	= document.getElementById("edit_parametro").value;
				
				if(edit_parametro === 'usuario'){
					$.post('processa/Usuarios/index.php', function(retorna){
						$("#listarUsuarios").html(retorna);
					});
				}
				if(edit_parametro === 'produto'){
					$.post('processa/Produtos/index.php', function(retorna){
						$("#listarProdutos").html(retorna);
					});
				}
				if(edit_parametro === 'fornecedor'){
					$.post('processa/Fornecedores/index.php', function(retorna){
						$("#listarFornecedores").html(retorna);
					});
				}
				if(edit_parametro === 'empresa'){
					$.post('processa/Empresas/index.php', function(retorna){
						$("#listarEmpresas").html(retorna);
					});
				}
			}else {
				document.getElementById("msgAlertaEditar").innerHTML = resposta['msg'];
			}
		});
	}







/*
	async function trocarStatus(id){
		const modalStatus = new bootstrap.Modal(document.getElementById("modalStatus"));
		modalStatus.show();
		
		document.getElementById("div_modal_status").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../../../../imagens/loading.gif' style='width:50px; heigth:50px'></img></div>";
		$.post('processa/div_modal_status.php?Id='+id, function(retorna){
			$("#div_modal_status").html(retorna);
		});
		
		const dados = await fetch('bd/visualizar.php?id=' + id);
		const resposta = await dados.json();
		console.log(resposta);
		var ticket = resposta['dados'].ticket;
		document.getElementById("lbl_status_ticket").innerText  =  ticket;
	}
	$(document).ready(function() {
		const formStatusRegistro = document.getElementById("form-status-registro");
		if (formStatusRegistro) {
			formStatusRegistro.addEventListener("submit", async(e) => {	
				var parametro = "ATUALIZAR_STATUS";
				
				e.preventDefault();
				const dadosForm = new FormData(formStatusRegistro);
				dadosForm.append("parametro", parametro);
				console.log(dadosForm);
				
				document.getElementById("msgAlertaStatus").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, salvando o registro!</div>";
				const dados = await fetch("bd/atualizar_status.php", {
					method: "POST",
					body: dadosForm
				});
				const resposta = await dados.json();
				console.log(resposta);
				
				if (resposta['status']) {
					document.getElementById("msgAlertaStatus").innerHTML = "";
					alert(resposta['msg']);
					carregarListaRegistros();
				}else {
					document.getElementById("msgAlertaStatus").innerHTML = resposta['msg'];
				}
			});
		}
	});


	async function finalizarChamado(id){
		const modalFinalizar = new bootstrap.Modal(document.getElementById("modalFinalizar"));
		modalFinalizar.show();
		
		document.getElementById("div_modal_finalizar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../../../../imagens/loading.gif' style='width:50px; heigth:50px'></img></div>";
		$.post('processa/div_modal_finalizar.php?Id='+id, function(retorna){
			$("#div_modal_finalizar").html(retorna);
		});
		
		const dados = await fetch('bd/visualizar.php?id=' + id);
		const resposta = await dados.json();
		console.log(resposta);
		var ticket = resposta['dados'].ticket;
		document.getElementById("lbl_finalizar_ticket").innerText  =  ticket;
	}
	$(document).ready(function() {
		const formStatusFinalizar = document.getElementById("form-finalizar-chamado");
		if (formStatusFinalizar) {
			formStatusFinalizar.addEventListener("submit", async(e) => {	
				var parametro = "FINALIZAR_CHAMADO";
				
				e.preventDefault();
				const dadosForm = new FormData(formStatusFinalizar);
				dadosForm.append("parametro", parametro);
				console.log(dadosForm);
				
				document.getElementById("msgAlertaFinalizar").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, salvando o registro!</div>";
				const dados = await fetch("bd/atualizar_status.php", {
					method: "POST",
					body: dadosForm
				});
				const resposta = await dados.json();
				console.log(resposta);
				
				if (resposta['status']) {
					document.getElementById("msgAlertaFinalizar").innerHTML = "";
					alert(resposta['msg']);
					carregarListaRegistros();
				}else {
					document.getElementById("msgAlertaFinalizar").innerHTML = resposta['msg'];
				}
			});
		}
	});


	async function editarRegistro(id){
		const editarRegistro = new bootstrap.Modal(document.getElementById("editarRegistro"));
		editarRegistro.show();
		
		document.getElementById("div_modal_edita_registro").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='../../../../imagens/loading.gif' style='width:50px; heigth:50px'></img></div>";
		$.post('processa/div_modal_edita_registro.php?Id='+id, function(retorna){
			$("#div_modal_edita_registro").html(retorna);
			
			$.post('processa/div_modal_anexos.php?Id='+id, function(retorna){
				$("#div_modal_anexos").html(retorna);
			});
			
			$.post('processa/div_modal_secoes.php?Id='+id, function(retorna){
				$("#div_modal_secoes").html(retorna);
			});
		});
		
		const dados = await fetch('bd/visualizar.php?id=' + id);
		const resposta = await dados.json();
		console.log(resposta);
		var ticket = resposta['dados'].ticket;
		document.getElementById("lbl_editar_ticket").innerText  =  ticket;
	}
	const formEditRegistro = document.getElementById("form-edit-registro");
	if (formEditRegistro) {
		formEditRegistro.addEventListener("submit", async(e) => {
			e.preventDefault();
			const dadosForm = new FormData(formEditRegistro);
			console.log(dadosForm);
			
			document.getElementById("msgAlertaEdit").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, salvando o registro!</div>";
			const dados = await fetch("bd/editar_registro.php", {
				method: "POST",
				body: dadosForm
			});
			const resposta = await dados.json();
			console.log(resposta);
			
			if (resposta['status']) {
				document.getElementById("msgAlertaEdit").innerHTML = "";
				alert(resposta['msg']);
			}else {
				document.getElementById("msgAlertaEdit").innerHTML = resposta['msg'];
			}
		});
	}
	
*/




