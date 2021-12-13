<?php require_once dirname(__DIR__).'/components/header.php'; ?>
    
    
    <table class="table crud">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                use App\Model\CargoDAO;
                $cargoDao = new CargoDAO();
            ?>
            <?php foreach ($cargoDao->read() as $cargo): ?>
            <tr>
                <td><?= $cargo['id'] ?></td>
                <td><?= $cargo['nome'] ?></td>
                <td><?= $cargo['descricao'] ?></td>
                <td><i class="bi bi-pencil-square"></i></td>
                <td><i class="bi bi-trash-fill"></i></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar Cargo</button>
    <!-- Modal -->
    <div class="modal" tabindex="-1" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Criar Cargo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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
            </div>
        </div>
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
    </script>

<?php require_once dirname(__DIR__).'/components/footer.php'; ?>