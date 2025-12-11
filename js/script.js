function devolucao(id) {
    var a = document.getElementById('modalzinha-fundo');
    a.style.display = 'flex';

    document.getElementById("futuro_id_obra").value = id;
}

function jaDevolvido() {
    var a = document.getElementById('modalzinha-fundo21');
    a.style.display = 'flex';
}

function fechar(){
    var b = document.getElementById("modalzinha-fundo");
    var a = document.getElementById('modalzinha-fundo21');
    if(a.style.display == "flex"){
        a.style.display = 'none';
    }

    if(b.style.display == "flex"){
        b.style.display = "none";
    }
}