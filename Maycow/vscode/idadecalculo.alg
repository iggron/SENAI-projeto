algoritmo "niver"
var
ano_nasc, idade, dias, mes, horas: inteiro
inicio

    escreval("Digite o ano de nascimento: ")
    leia(ano_nasc)
    idade <- 2026 - ano_nasc
    dias <- idade * 365
    mes <- idade * 12
    horas <- dias * 24
    escreval("------------------------------------------------")
    escreval("Você nasceu em: ", ano_nasc)
    escreval("Sua idade em 2026 será: ", idade)
    escreval("Por curiosidade, você está vivo a ", dias, " dias.")
    escreval("E em meses, você está vivo a ", mes, " meses")
    escreval("e ", horas, " horas.")

fimalgoritmo