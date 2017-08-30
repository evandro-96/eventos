function camposDeNotas(opc) {
    var notas = $('#notas');
    if (opc == 1) {
        $('#comentario').text('Comentários');
        let tipo = {
            1: "Desempenho Técnico (0 - 20)",
            2: "Desempenho Artístico (0 -20)",
            3: "Adaptação/ Remontagem(0 -20)",
            4: "Musicalidade (0 -20)",
            5: "Espaço Cênico (0 -10)",
            6: "Figurino (0 - 10)",
        };

        for (let i = 1; i < 7; i++) {
            let conct = "nota-" + i;

            let max = i > 4 ? 10 : 20;

            notas.append(
                "<div class=\"form-group col-lg-6 col-md-12 col-sm-12\">" +
                "<label for=" + conct + ">" + tipo[i] + "</label>" +
                "<input class='form-control campo-nota' value='0' type='number' min='0' max=" + max + " name=" + conct + ">" +
                "</div>"
            );
        }
    } else if (opc == 2) {
        $('#comentario').text('Comentários');
        let tipo = {
            1: "Criação - Tema - Coerência (0 - 20)",
            2: "Desenho Coreográfico - Espaço Cênico(0 -20)",
            3: "Coerência - Figurino - Acessórios (0 -20)",
            4: "Desempenho Técnico - Artístico (0 -20)",
            5: "Dinâmica - Musicalidade (0 -20)",
        };
        for (let i = 1; i < 6; i++) {
            let conct = "nota-" + i;
            notas.append(
                "<div class=\"form-group col-lg-6 col-md-12 col-sm-12\">" +
                "<label for=" + conct + ">" + tipo[i] + "</label>" +
                "<input class='form-control' type='number' value='0' min='0' max='20' name=" + conct + ">" +
                "</div>"
            );
        }
    } else {
        $('#comentario').text('Parecer Técnico');
    }
}

function recarregaCampo(opc) {
    var notas = $('#notas');
    notas.empty();
    $('#total-notas').empty();
    camposDeNotas(opc);
}

function somaNotas() {
    let total = 0;
    $('.campo-nota').each(function (i, e) {
        total += parseInt(e.value);
        // console.log(e.value);
    });
    if (total <= 100) {
        $('#total-notas').text("Total : " + total);
    } else {
        $('#total-notas').text("Valor inválido, verificar notas!");
    }
}