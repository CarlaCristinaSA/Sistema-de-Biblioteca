<?php
$pag = 'usuarios';
?>

<a onclick="inserir()" type = "button" class="btn btn-primary"><span class="fa fa-plus"></span> Adicionar Funcionário</a>

<div class="bs-example widget-shadow" style="padding:15px" id="listar">

</div>


<!-- Modal Perfil -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="titulo_inserir"></span></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form">
			<div class="modal-body">
				

					<div class="row">
						<div class="col-md-6">							
								<label>Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Seu Nome">					
						</div>
						<div class="col-md-6">							
								<label>CPF</label>
								<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Seu CPF">						
						</div>
				
					</div>


					<div class="row">
						<div class="col-md-6">							
								<label>Telefone</label>
								<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Seu Telefone" >
								</div>
						<div class="col-md-6">							
								<label>Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Seu Nome" >
						</div>
						
					</div>

					<div class="row">
						<div class="col-md-6">							
								<label>Endereço</label>
								<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Seu Endereço">							
						</div>
						<div class="col-md-6">							
								<label>Categoria</label>
									<select class="form-control" name="categoria" id="categoria">
										<option>Coordenador</option>
										<option>Auxiliar de Biblioteca</option>
									</select>
					</div>

					<div class="row">
						<div class="col-md-8">							
								<label>Foto</label>
								<input type="file" class="form-control" id="foto" name="foto" onchange="carregarImg()">							
						</div>

						<div class="col-md-4">								
							<img src="images/perfil/sem-foto.jpg" width="100px" id="target">								
							
						</div>

						
					</div>
				
				<br>
				<small><div id="mensagem" align="center"></div></small>
			</div>
			<div class="modal-footer">       
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
			</form>
		</div>
	</div>
</div>


<input type="hidden" class="form-control" id="id" name="id">							

<script type="text/javascript"> var pag = "<?=$pag?>"
</script>
<script src="js/ajax.js">
</script>


<script type="text/javascript">
	function carregarImg() {
    var target = document.getElementById('target');
    var file = document.querySelector("#foto").files[0];
    
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }
</script>

