algoritmo 
var 
 ano_nasc, idade, dias, horas, semana: inteiro
decadas, milenio: inteiro

inicio

  escreval ("Digite o ano do seu nascimento: ")
  leia (ano_nasc)
  
  decadas <- idade * /10
  idade <- 2026 - ano_nasc
  dias <- idade * 365  
  semanas <- dias / 7 
  horas <- dias * 24


    escreval ("Sua idade aprox: ", idade)
    escreval ("voce vivel a ", decadas, " decadas")
    escreval ("voce vivel a ", dias, " dias")
    escreval ("voce vivel a ", semanas, " semanas")
    escreval ("voce vivel a ", horas, " horas")


fimalgoritmo