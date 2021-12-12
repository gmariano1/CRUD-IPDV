<?php require_once dirname(__DIR__).'/components/header.php'; ?>
<?php 
    use App\Model\CentroDeCustoDAO; 
    $centro_de_custo = new CentroDeCustoDAO();
?>
    <div class="container">
        <h1 class="display-5">Departamento</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="centro_de_custo" class="form-label">Centro de Custo</label>
            <select class="form-select" aria-label="Default select example" required>
                <option selected disabled>Selecione seu centro de custo</option>
                <?php foreach ($centro_de_custo->read() as $centro): ?>
                    <option value="<?= $centro['id'] ?>"><?= $centro['nome'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="button" class="btn btn-primary" onclick="inserir()">Cadastrar</button>
    </div>
    <script>
        function inserir(){
            const type = "departamento";
            const nome = $("#nome").val();
            const centro_de_custo_id = $(".form-select").val();
            const obj = {
                type, nome, centro_de_custo_id
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