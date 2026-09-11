algoritmo "semnome"

var
 nome: caractere

 inicio
  escreval ("BOM DIA!") 
  escreva ("qual e o seu nome? ")
  leia (nome)
  se (nome = "snake") entao
  escreva ("entao voce é o famosa cobra pelada,cobra solida, cobra quase solida ou cobra liquida ", nome)
  senao 
  algoritmo "semnome"
  escreva (nome, " tenha um bom dia")
  fimse
fimalgoritmo