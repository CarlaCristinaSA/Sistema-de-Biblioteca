$(document).ready(function() {    
    listar();    
} );

function listar(){	
    $.ajax({
        url: 'paginas/' + pag + "/listar.php",
        method: 'POST',
        data: {},
        dataType: "html",

        success:function(result){
            $("#listar").html(result);
          $('#mensagem-excluir').text('');
        }
    });
}

function inserir(){
    $('#mensagem').text('');
    $('#titulo_inserir').text('Adicionar Novo Funcionário');
    $('#modalForm').modal('show');
    limparCampos();
}


$("#form").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: 'paginas/' + pag + "/salvar.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

                $('#btn-fechar').click();
                listar();          

            } else {

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});
