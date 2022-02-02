<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aifast - estamos quase lá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./media/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./media/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[name=aceito]').change(function(){
                if ($(this).is(':checked')) {
                    $('input[name=btnCad]').removeAttr('disabled');
                } else {
                    $('input[name=btnCad]').attr('disabled',true);
                }
            });
        });
    </script>
</head>
<body>
    <div id="cadastro-container">
        <a id="cadastro-navbrand" href="index.php" class="navbar-brand font-laranja-xbold-italic navbrand-aifast">aifast</a>
        <div id="cadastro-texto">
            <h1 id="cadastro-titulo" class="font-preto-heavy">Quase lá, <?php $name = $_SESSION['fname'];echo "$name...";?></h1>
            <h2 id="cadastro-subtitulo" class="font-preto-bold">Só precisamos de mais algumas informações para finalizar o seu registro.</h2>
        </div>
        <div id="cadastro-form-container">
            <form method="post" action="save.php" id="form-aifast" class="cadastro-row">
                <h3 class="font-preto-heavy cadastro-input-name">Dados pessoais</h3>
                <div class="row cadastro-row">
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">CPF</label>
                        <input type="text" name="cpf" class="cadastro-input form-control aifast-input" placeholder="000.000.000-00" aria-label="CPF" data-required data-exa-length="14">
                    </div>
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">Data de Nascimento</label>
                        <input type="date" name="bDate" class="cadastro-input form-container form-control aifast-input" placeholder="dd/mm/aaaa" aria-label="Data de Nascimento" data-required data-min-length="10">
                    </div>
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">RG</label>
                        <input type="text" name="rg" class="cadastro-input form-control aifast-input" placeholder="00.000.000-0" aria-label="Last name" data-required data-exa-length="13">
                    </div>
                </div>
                <h3 class="font-preto-heavy cadastro-input-name">Seu veículo</h3>
                <div class="row cadastro-row">
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">Renavam</label>
                        <input type="text" name="renavam" class="cadastro-input form-control aifast-input" placeholder="000000000" aria-label="renavam" data-required data-exa-length="9">
                    </div>
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">CNH</label>
                        <input type="text" name="cnh" class="cadastro-input form-control aifast-input" placeholder="00000000000" aria-label="CNH" data-required data-exa-length="11">
                    </div>
                </div>
                <!-- <h3 class="font-preto-heavy cadastro-input-name">Dados bancários</h3>
                <div class="row cadastro-row">
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">Número da Conta</label>
                        <input type="text" class="cadastro-input form-control aifast-input" placeholder="00000000-0" aria-label="Número da Conta" data-required data-exa-length="10">
                    </div>
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">Dígito</label>
                        <input id="digito-input" type="text" class="cadastro-input form-control aifast-input" placeholder="XX" aria-label="Dígito" data-required data-exa-length="2">
                    </div>
                </div>
                <div class="row cadastro-row">
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">Banco</label>
                        <input type="" class="cadastro-input form-control aifast-input" placeholder="000" aria-label="Banco" data-required data-exa-length="3">
                    </div>
                    <div class="col cadastro-col">
                        <label class="cadastro-label font-preto-regular">Tipo de Conta</label>
                        <input type="text" class="cadastro-input form-control aifast-input" placeholder="Corrente/Poupança" aria-label="Conta" data-required>
                    </div>
                    <div class="col">
                        <label class="cadastro-label font-preto-regular">Agência</label>
                        <input type="number" class="cadastro-input form-control aifast-input" placeholder="0000" aria-label="Agência" data-required>
                    </div> -->
                </div>
                <div class="custom-checkbox">
                    <input id="aifast-checkbox" name="aceito" type="checkbox" />
                    <label id="aifast-termos-cadastro" for="aifast-checkbox" class="font-preto-regular">Concordo com os <a href="https://aifast.com.br/termos_de_uso.pdf" target="_blank" class="aifast-link">Termos de uso</a> e com o processamento dos meus dados de acordo com a <a href="https://aifast.com.br/politica_de_privacidade.pdf" target="_blank" class="aifast-link">Política de Privacidade</a>.</label>
                </div>
                <input id="form-btn" name="btnCad" value="FINALIZAR" class="btn-aifast cadastro-btn btn btn-primary btn-aifast rounded-pill" type="submit" disabled />
            </form> 
            <p class="error-validation template"></p>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>