<?php 
    include_once("head.php");

    echo " <body>
    <div class='card container mt-3'>
        <div class='mt-2'>
            <h2 style= 'text-align: center;' class='mt-0'>OPERAÇÕES BANCÁRIAS</h2>
        </div>
        <form action='operacoes.php' method='POST'>
            <div class='mb-3'>
                <label class='form-label'>Conta</label>
                <input type='text' class='form-control' id='conta' name='conta' value = '' onblur='V_conta(this)'>
                <div id='alertaConta' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Operação</label>
                <select class='form-select' name='operacao'>    
                    <option value='Saldo'>Saldo</option>
                    <option value='Saque'>Saque</option>
                    <option value='Deposito'>Depósito</option>
                </select>   
            </div>
            <div class='mb-3'>
                <label class='form-label'>Valor</label>
                <input type='text' class='form-control' id='conta' name='valor' value = '' onblur='V_valor(this)'>
                <div id='alertaValor' class='form-text'></div>
            </div>
            
            <div class='mb-3'>
                <input type='submit' class='btn btn-primary' value='Confirmar' onclick='V_confirmar()'>
            </div>
        </form>
    </div>
    </body>";


?>