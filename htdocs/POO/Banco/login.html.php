<?php 
    include_once("head.php");

    echo " <body>
    <div class='card container mt-3'>
        <div class='mt-2'>
            <h2 style= 'text-align: center;' class='mt-0'>LOGIN CONTA BANCÁRIA</h2>
        </div>
        <form action='login.php' method='POST'>
            <div class='mb-3'>
                <label class='form-label'>Agência*</label>
                <input type='text' class='form-control' id='agencia' name='agencia' value = '' onblur='V_agencia(this)' required>
                <div id='alertaAgencia' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Conta*</label>
                <input type='text' class='form-control' id='conta' name='conta' value = '' onblur='V_conta(this)' required>
                <div id='alertaConta' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Senha*</label>
                <input type='password' class='form-control' id='senha' name='senha' value = '' onblur='V_senha(this)' required>
                <div id='alertaSenha' class='form-text'></div>
            </div>
            
            <div class='mb-3'>
                <input type='submit' class='btn btn-primary' value='Criar Conta' onclick='V_cadastrar()'>
            </div>
        </form>
    </div>
    </body>";


?>