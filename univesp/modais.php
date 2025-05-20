


	<div class="modal fade modalCadastrar" id="modalCadastrar" tabindex="-1" aria-labelledby="visualizaModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-lg" role="document" style="max-width: 1080px">
			<div class="modal-content">
				<div class="modal-header ">
					<h5 class="modal-title text-center col-md-5 form-row " id="visualizaModalLabel" >
						<label class="col-md-8 " id='titulo_modal'>Cadastrar Registro: </label>
						<label class=" col-md-4" id="lbl_visualizar" style="text-align:left"></label>
					</h5>
					<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				
				<div class="modal-body" style="background-color:#eaedee">
					<span id="msgAlertaCadastrar"></span>
					<form method="POST" id="form-cad-registro" >
						<div class=" form-row col-md-12" id="div_modal_cadastrar">
							<!-- processa/.php -->
						</div>
						
						<button type="button" class="btn btn-danger far fa-times-circle" data-dismiss="modal" style="float: left;">&nbsp; Cancelar</button>
						<button type="submit" class="btn btn-success far fa-save" id="btn_salvar_cadastrar" name="" style="float: right;">&nbsp; Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade modalEditar" id="modalEditar" tabindex="-1" aria-labelledby="visualizaModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-lg" role="document" style="max-width: 1080px">
			<div class="modal-content">
				<div class="modal-header ">
					<h5 class="modal-title text-center col-md-5 form-row " id="visualizaModalLabel" >
						<label class="col-md-8 " id='titulo_modal'>Editar Registro: </label>
						<label class=" col-md-4" id="lbl_visualizar" style="text-align:left"></label>
					</h5>
					<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				
				<div class="modal-body" style="background-color:#eaedee">
					<span id="msgAlertaEditar"></span>
					<form method="POST" id="form-edit-registro" >
						<div class=" form-row col-md-12" id="div_modal_editar">
							<!-- processa/.php -->
						</div>
						
						<button type="button" class="btn btn-danger far fa-times-circle" data-dismiss="modal" style="float: left;">&nbsp; Cancelar</button>
						<button type="submit" class="btn btn-success far fa-save" id="btn_salvar_editar" name="btn_salvar_editar" style="float: right;">&nbsp; Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>




<!-- MODAL VISUALIZAR -->
	<div class="modal fade modalVisualizar" id="modalVisualizar" tabindex="-1" aria-labelledby="visualizaModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-lg" role="document" style="max-width: 1080px">
			<div class="modal-content">
				<div class="modal-header ">
					<h5 class="modal-title text-center col-md-5 form-row " id="visualizaModalLabel" >
						<label class="col-md-8 " id='titulo_modal'>Visualizar Registro: </label>
						<label class=" col-md-4" id="lbl_visualizar" style="text-align:left"></label>
					</h5>
					<input type='hidden' id='id_registro' name='id_registro' value='' />
					<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				
				<div class="modal-body" style="background-color:#eaedee">
					<span id="msgAlertaVisualizar"></span>
					
					<div class=" form-row col-md-12" id="div_modal_visualizar">
						<!-- processa/PARAMETRO/div_modal_visualizar.php -->
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="modal fade modalEditar" id="modalEditar" tabindex="-1" aria-labelledby="cadastrarEmpresaModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-xl " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center col-md-8 form-row " id="visualizaModalLabel" >
						<label class="col-md-8 ">Editar Registro: </label>
						<label class=" col-md-4" id="lbl_editar_ticket" style="text-align:left"></label>
					</h5>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" style="background-color:#eaedee" id="">
					<span id="msgAlertaEditar"></span>
					
					<div class="form-row col-md-12" id="div_modal_edita_registro">
						<!-- processa/div_modal_edita_registro.php -->
						
						<form method="POST" id="form-edit-registro" >
							<button type="button" class="btn btn-danger far fa-times-circle" data-dismiss="modal" style="float: left;">&nbsp; Cancelar</button>
							<button type="submit" class="btn btn-success far fa-save" id="btn_salvar_editar" name="" style="float: right;">&nbsp; Salvar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- MODAL -->
	<div class="modal fade enviarCotacaoModal" id="enviarCotacaoModal" tabindex="-1" aria-labelledby="visualizaModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h5 class="modal-title text-center col-md-9 " id="visualizaModalLabel" >
						<label class="col-md-12 ">Enviar Cotação: </label>
					</h5>
					<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" style="background-color:#eaedee">
					<span id="msgAlertaEnviarCotacao"></span>
					<form method="POST" id="form-enviar_cotacao" enctype="multipart/form-data">
						<div name="" id="div_modal_enviar_cotacao" class="col-md-12 form-row">  
							<!-- processa/div_modal_enviar_cotacao.php -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


<!-- MODAL VISUALIZAR -->
	<div class="modal fade modalCotacao" id="modalCotacao" tabindex="-1" aria-labelledby="visualizaModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-lg" role="document" style="max-width: 1080px">
			<div class="modal-content">
				<div class="modal-header ">
					<h5 class="modal-title text-center col-md-5 form-row " id="visualizaModalLabel" >
						<label class="col-md-8 " id='titulo_modal'>Registro Cotação: </label>
						<label class=" col-md-4" id="lbl_visualizar" style="text-align:left"></label>
					</h5>
					<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				
				<div class="modal-body" style="background-color:#eaedee">
					<span id="msgAlertaCotacao"></span>
					
					<div class=" form-row col-md-12" id="div_modal_cotacao">
						<!-- processa/Cotacoes/div_modal_cotacao.php -->
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- MODAL IMPORTAR MIGRATE -->
		<div class="modal fade modalImportacao" id="modalImportacao" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-center" id="cadUsuarioModalLabel" style="color:#25a9cc; text-align:center">
							Upload Arquivos
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body" style="background-color:#eaedee">
						<span id="msgAlertaUpload"></span>

						
						<div class="col-md-12">
							<select class="form-control col-md-12" id="select_arquivo" name="select_arquivo">
								<option value="0">Selecione qual arquivo deseja Importar</option>
								<option value="Usuários">		Usuários		</option>
								<option value="Fornecedores">	Fornecedores	</option>
								<option value="Produtos">		Produtos 		</option>
								<option value="Cotação">		Cotação			</option>
								<option value="Empresas">		Empresas		</option>
							</select>
						</div>
						
						<div class="col-md-12 " id="div_upload_usuarios">
							<form method="POST" action="bd/importar_xml.php" enctype="multipart/form-data">
							<div class="form-group  ">
								<div class="row mb-12">
								   <label for="" class="col-sm-12 col-form-label">Importação de Usuários:</label>
								   <div class="col-sm-12">
										<input type="file" name="arquivo[]" multiple="multiple" class="form-control-file col-md-12"><br>
								   </div>
								</div>
							
								<button type="button" class="btn btn-danger far fa-times-circle" data-dismiss="modal" style="float: left;">&nbsp; Cancelar</button>
								<button type="submit" class="btn btn-success far fa-save" id="btnSalvarXML" name="btnSalvarXML" style="float: right;">&nbsp; Salvar</button>
							</div>
							</form>
						</div>
						
						<div class="col-md-12 " id="div_upload_fornecedores">
							<form method="POST" action="bd/importar_xml.php" enctype="multipart/form-data">
							<div class="form-group  ">
								<div class="row mb-12">
								   <label for="" class="col-sm-12 col-form-label">Importação de Fornecedores:</label>
								   <div class="col-sm-12">
										<input type="file" name="arquivo[]" multiple="multiple" class="form-control-file col-md-12"><br>
								   </div>
								</div>
							
								<button type="button" class="btn btn-danger far fa-times-circle" data-dismiss="modal" style="float: left;">&nbsp; Cancelar</button>
								<button type="submit" class="btn btn-success far fa-save" id="btnSalvarXML" name="btnSalvarXML" style="float: right;">&nbsp; Salvar</button>
							</div>
							</form>
						</div>	

						<div class="col-md-12 " id="div_upload_produtos">
							<form method="POST" action="bd/salvar_saida_2.php" enctype="multipart/form-data">
								<div class="form-group  ">
									<div class="row mb-12">
									   <label for="" class="col-sm-12 col-form-label">Importação de Produtos:</label>
									   <div class="col-sm-12">
											<input type="file" name="arquivo[]" multiple="multiple" class="form-control-file col-md-12"><br>
									   </div>
									</div>
								
									<button type="button" class="btn btn-danger far fa-times-circle" data-dismiss="modal" style="float: left;">&nbsp; Cancelar</button>
									<button type="submit" class="btn btn-success far fa-save" id="btnSalvarNFSE2" name="btnSalvarNFSE2" style="float: right;">&nbsp; Salvar</button>
								</div>
							</form>
						</div>
						
						<div class="col-md-12 " id="div_upload_cotacao">
							<form method="POST" action="bd/salvar_saida_lancadas.php" enctype="multipart/form-data">
								<div class="form-group  ">
									<div class="row mb-12">
									   <label for="" class="col-sm-12 col-form-label">Importação de Cotação:</label>
									   <div class="col-sm-12">
											<input type="file" name="arquivo[]" multiple="multiple" class="form-control-file col-md-12"><br>
									   </div>
									</div>
								
									<button type="button" class="btn btn-danger far fa-times-circle" data-dismiss="modal" style="float: left;">&nbsp; Cancelar</button>
									<button type="submit" class="btn btn-success far fa-save" id="btnSalvarItensSonlicitacao" name="btnSalvarItensSonlicitacao" style="float: right;">&nbsp; Salvar</button>
								</div>
							</form>
						</div>
						
						<div class="col-md-12 " id="div_upload_empresas">
							<form method="POST" action="bd/salvar_saida_lancadas.php" enctype="multipart/form-data">
								<div class="form-group  ">
									<div class="row mb-12">
									   <label for="" class="col-sm-12 col-form-label">Importação de Empresas:</label>
									   <div class="col-sm-12">
											<input type="file" name="arquivo[]" multiple="multiple" class="form-control-file col-md-12"><br>
									   </div>
									</div>
								
									<button type="button" class="btn btn-danger far fa-times-circle" data-dismiss="modal" style="float: left;">&nbsp; Cancelar</button>
									<button type="submit" class="btn btn-success far fa-save" id="btnSalvarItensSonlicitacao" name="btnSalvarItensSonlicitacao" style="float: right;">&nbsp; Salvar</button>
								</div>
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>


