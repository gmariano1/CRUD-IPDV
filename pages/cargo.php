<?php require_once dirname(__DIR__).'/components/header.php'; ?>
    <div class="container">
        <h1 class="display-5">Cargo</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" id="descricao" class="form-control" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="inserir()">Cadastrar</button>
    </div>
    <script>
        function inserir(){
            const type = "cargo";
            const nome = $("#nome").val();
            const desc = $("#descricao").val();
            const obj = {
                type, nome, desc
            };
            $.ajax({
                url: '<?= SITE_URL ?>pages/ajax/inserir.php',
                type: 'POST',
                data: obj,
                beforeSend: function(){
                    $(".btn.btn-primary").prop('disabled', true).text("Cadastrando...");
                },
                success: function(result){
                    alert(result.msg);
                    $(".btn.btn-primary").prop('disabled', false).text("Cadastrar");
                    clearThis($("#nome"));
                },
                dataType: 'json'
            });
        }

        function clearThis(target) {
            target.val() = "";
        }
    </script>

<?php require_once dirname(__DIR__).'/components/footer.php'; ?>