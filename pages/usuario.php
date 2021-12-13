<?php require_once dirname(__DIR__).'/components/header.php'; ?>
<?php 
    use App\Model\CargoDAO;
    use App\Model\DepartamentoDAO;
    $departamento = new DepartamentoDAO();
    $cargo = new CargoDAO();
?>
    <div class="container">
        <h1 class="display-5">Usuário</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_de_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" id="data_de_nascimento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" class="form-control" required maxlength="14">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" id="senha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <select class="form-select cargo" aria-label="Default select example" required>
                <option selected disabled>Selecione o cargo</option>
                <?php foreach ($cargo->read() as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>
            <select class="form-select departamento" aria-label="Default select example" required>
                <option selected disabled>Selecione o departamento</option>
                <?php foreach ($departamento->read() as $d): ?>
                    <option value="<?= $d['id'] ?>"><?= $d['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="button" class="btn btn-primary" onclick="inserir()">Cadastrar</button>
    </div>
    <script>
        
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });

        function inserir()
        {
            const type = "usuario";
            const nome = $("#nome").val();
            const cargo_id = $(".form-select.cargo").val();
            const departamento_id = $(".form-select.departamento").val();
            const cpf = $("#cpf").val().replace(".", "").replace(".", "").replace("-", "");
            const email = $('#email').val();
            const senha = $('#senha').val();
            const data_de_nascimento = $('#data_de_nascimento').val();
            const obj = {
                type, nome, cpf, email, data_de_nascimento, cargo_id, departamento_id
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
                },
                dataType: 'json'
            });
        }

    </script>

<?php require_once dirname(__DIR__).'/components/footer.php'; ?>