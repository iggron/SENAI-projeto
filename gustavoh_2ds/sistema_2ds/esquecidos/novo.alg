algoritmo "semnome"

var
 nome: caractere

 inicio
  escreval ("BOM DIA!") 
  escreva ("qual e o seu nome?")
  leia (nome)
  se (nome = "isaac") entao
  escreva ("entao voce é o famoso the binding of ", nome)
  senao 
  algoritmo "semnome"
  escreva (nome, " tenha um bom dia")
  fimse
fimalgoritmo