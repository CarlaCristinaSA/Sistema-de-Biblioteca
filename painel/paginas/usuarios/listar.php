<?php
$tabela = 'usuarios';
require_once("../../../conexão.php");
$query = $pdo->query("SELECT * from $tabela order by id desc " );
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($resultado);
if($linhas > 0) {

echo <<<HTML
<small>
        <table class="table table-hover" id="tabela">
        <thead> 
        <tr> 
        <th>Nome</th>	
        <th class="esc">Telefone</th>	
        <th class="esc">Email</th>	
        <th class="esc">Categoria</th>	
        <th>Ações</th>
        </tr> 
        </thead> 
        <tbody>	
HTML;
}

for($i=0; $i < $linhas; $i++){	
    $id = $resultado[$i]['id'];
    $nome = $resultado[$i]['nome'];
    $telefone = $resultado[$i]['telefone'];
    $email = $resultado[$i]['email'];
    $CPF = $resultado[$i]['CPF'];
    $categoria = $resultado[$i]['categoria'];
    $ativo = $resultado[$i]['ativo'];
    $data = $resultado[$i]['Data'];
    $endereco = $resultado[$i]['endereco'];
    $senha = $resultado[$i]['senha'];

    $dataF = implode ('/', array_reverse(explode('-', $data)));

    if($ativo == 'Sim'){
        $icone = 'fa-check-square';
        $titulo_link = 'Desativar Usuário';
        $acao = 'Não';
        $classe_ativo = '';
    }else{
        $icone = 'fa-square-o';
        $titulo_link = 'Ativar Usuário';
        $acao = 'Sim';
        $classe_ativo = '#c4c4c4';
    }
    
    $classe_adm = '';
    if($categoria == 'Administrador'){
        $senha = '********';
        $classe_adm = 'ocultar';
    }		
    

echo <<<HTML
<tr style="color:{$classe_ativo}">
    <td>
        {$nome}
    </td>
    <td class="esc">
         {$telefone}
    </td>
    <td class="esc">
        {$email}
    </td>
    <td class="esc">
        {$categoria}
    </td>
    <td> 
        <big><a href="#" onclick="editar('{$id}','{$nome}','{$email}','{$telefone}','{$endereco}','{$categoria}','{$CPF}',)" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>
        <li class="dropdown head-dpdn2" style="display: inline-block;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <big>
                <i class="fa fa-trash-o text-danger">

                </i>
            </big>
        </a>
        <ul class="dropdown-menu" style="margin-left:-230px;">
        <li>
            <div class="notification_desc2">
                <p>Confirmar Exclusão? <a href="#" onclick="excluir('{id}')"><span class="text-danger">Sim</span></a></p>
</div>
</li>
</ul>
</li>

<big><a href="#" onclick="mostrar('{$nome}','{$email}','{$telefone}','{$CPF}','{$endereco}',
'{$ativo}','{$categoria}','{$data}','{$senha}')" 
tittle="Mostrar Dados"><i class="fa fa-info-circle text primary"></i></a></big>

<big> <a href="#" onclick="ativar('{id}',{'$acao'})" 
title="{$titulo_link}">
<i class="fa {$icone} text-sucess" >
</i></a></big>



</td>
</tr>
HTML;
}

echo <<<HTML
</tbody>
<small> <div align="center" id="mensagem-excluir"></div> </small>
</table>

HTML;
?>

<script type="text/javascript">
	$(document).ready( function () {		
    $('#tabela').DataTable({
    	"language" : {
            "url" : '//cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
        },
        //"ordering": false,
		"stateSave": true
    });
} );
</script>


<script type="text/javascript">
    function editar (id, nome, email, telefone, endereco, categoria, cpf )  {
       $('#mensagem').text('');
       $('#titulo_inserir').text('Editar Registro');


       $('#id').val(id);
       $('#nome').val(nome);
       $('#email').val(email);
       $('#telefone').val(telefone);
       $('#endereco').val(endereco);
       $('#categoria').val(categoria).change();
       $('#cpf').val(cpf);

       $('#modalForm').modal('show');

    }

</script>