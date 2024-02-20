function V_nome(campo) {
    if (campo.value.trim() == '') {
        document.getElementById("alertaNome").innerHTML = '* Campo obrigatório';
        document.getElementById("alertaNome").style.color = 'red';
    } else {
        document.getElementById("alertaNome").innerHTML = '';
    }
}

function V_cpf(campo) {
    if (campo.value.trim() == '') {
        document.getElementById("alertaCPF").innerHTML = '* Campo obrigatório';
        document.getElementById("alertaCPF").style.color = 'red';
    }else {
        document.getElementById("alertaCPF").innerHTML = '';
    }
}

function formatCPF(campo) {
    let cpf = campo.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    cpf = cpf.substring(0, 11); // Limita o CPF a 11 dígitos (sem formatação)
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o hífen
    campo.value = cpf; // Define o valor formatado no campo de entrada
}

function V_dataNascimento(campo) {
    if (campo.value.trim() == '') {
        p = document.getElementById("alertaDataNascimento").innerHTML = '* Campo obrigatório';
        document.getElementById("alertaDataNascimento").style.color = 'red';
    } else {
        document.getElementById("alertaDataNascimento").innerHTML = '';
    }
}

function V_cadastrar() {
    n = document.getElementById("nome");
    c = document.getElementById("cpf");
    d = document.getElementById("dataNascimento");
    V_nome(n);
    V_cpf(c);
    V_dataNascimento(d);
}

