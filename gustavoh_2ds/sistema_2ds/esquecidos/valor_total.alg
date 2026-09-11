algoritmo "Valor compra"
var
  quantidade1, quantidade2, quantidade3, totalcompra1, totalcompra2, totalcompra3: real
 total1, total2, total3, valorunitario1, valorunitario2, valorunitario3: real
produto1, produto2, produto3: caractere
inicio 

escreva ("insira o primeiro produto: ") 
leia (produto1)
escreva ("insira a quantidade produto:")
leia (quantidade1)
escreva ("insira o valor unitario do produto:")
leia (valorunitario1)

total1 := quantidade1 * valorunitario1
escreval ("_____________________________________________________")
escreval ("")

escreva ("insira o segundo produto: ") 
leia (produto2)
escreva ("insira a quantidade produto:")
leia (quantidade2)
escreva ("insira o valor unitario do produto:")
leia (valorunitario2)

total2 := quantidade2 * valorunitario2
escreval ("___________________________________________________")
escreval ("")

escreva ("insira o terceiro produto: ")
leia (produto3)
escreva ("insira a quantidade produto: ")
leia (quantidade3)
escreva ("insira o valor unitario do produto: ")
leia (valorunitario3)

total3 := quantidade3 * valorunitario3

totalcompra1 := quantidade1 * valorunitario1
totalcompra2 := quantidade2 * valorunitario2
totalcompra3 := quantidade3 * valorunitario3

escreval ("")  
escreval ("produto1:", produto1, " quantidade:", quantidade1, " valor unitário:", valorunitario1," total:", total1)
escreval ("produto2:", produto2, " quantidade:", quantidade2, " valor unitário:", valorunitario2," total:", total2)
escreval ("produto3:", produto3, " quantidade:", quantidade3, " valor unitário:", valorunitario3," total:", total3)
escreval ("")
escreval ("==========================================================")
escreval ("total da compra:", totalcompra1 + totalcompra2 + totalcompra3)
escreval ("==========================================================")



fimalgoritmo