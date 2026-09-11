algoritmo "calculocompra3"
var
c1, c1q, c1t, c2, c2q, c2t, c3, c3q, c3t, total: real
c1n, c2n, c3n: caractere
inicio

escreval("Digite o nome do primeiro produto: ")
    leia(c1n)
    escreval("Digite o valor do primeiro produto: ")
    leia(c1)
    escreval("Digite a quantidade do primeiro produto: ")
    leia(c1q)

    escreval("------------------------------------------------")

    escreval("Digite o nome do segundo produto: ")
    leia(c2n)
    escreval("Digite o valor do segundo produto: ")
    leia(c2)
    escreval("Digite a quantidade do segundo produto: ")
    leia(c2q)

    escreval("------------------------------------------------")

    escreval("Digite o nome do terceiro produto: ")
    leia(c3n)
    escreval("Digite o valor do terceiro produto: ")
    leia(c3)
    escreval("Digite a quantidade do terceiro produto: ")
    leia(c3q)

    escreval("------------------------------------------------")

    c1t <- c1 * c1q
    escreval("O valor total do produto ", c1n, " é: ", c1t)
    c2t <- c2 * c2q
    escreval("O valor total do produto ", c2n, " é: ", c2t)
    c3t <- c3 * c3q
    escreval("O valor total do produto ", c3n, " é: ", c3t)
    total <- c1t + c2t + c3t

    escreval("------------------------------------------------")
    escreval("O valor total da compra é: ", total)

fimalgoritmo
