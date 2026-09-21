algoritmo "Compra"
var
   produto1, produto2, produto3, soma1, soma2, soma3, total: real
   qun1, qun2, qun3: inteiro
   nom1, nom2, nom3: caractere
inicio
   escreva("Qual o nome do primeiro produto? ")
   leia(nom1)
   escreva("Qual o preço do primeiro produto? ")
   leia(produto1)
   escreva(" Quantas unidades do primeiro produto voce comprou? ")
   leia(qun1)
   
   escreva("Qual o nome do segundo produto? ")
   leia(nom2)
   escreva("Qual o preço do segundo produto? ")
   leia(produto2)
   escreva(" Quantas unidades do segundo produto voce comprou? ")
   leia(qun2)

   escreva("Qual o nome do terceiro produto? ")
   leia(nom3)
   escreva("Qual o preço do terceiro produto? ")
   leia(produto3)
   escreva("Quantas unidades do terceiro produto voce comprou? ") 
   leia(qun3)

   soma1<- produto1 * qun1
   soma2<- produto2 * qun2
   soma3<- produto3 * qun3
   total<- soma1 + soma2 + soma3
   
   escreval("-------------------------------------------------------")
   escreval("Seu primeiro produto foi: ", nom1, " e o valor total foi: R$", soma1)
   escreval("Seu segundo produto foi: ", nom2, " e o valor total foi: R$", soma2)
   escreval("Seu terceiro produto foi: ", nom3, " e o valor total foi: R$", soma3)
   escreval("")
   escreval("O valor total da compra foi: R$", total)
   escreval("-------------------------------------------------------")

fimalgoritmo