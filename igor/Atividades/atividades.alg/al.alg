algoritmo "Revisão"
var
  ano_nasc, idade, decadas, milenios, mes, semanas, dias, horas, minutos, segundos, milesimo, microsegundo, nanossegundo, picossegundo: inteiro

inicio
   escreva("Entre com o ano de nascimento: ")
   leia(ano_nasc) 

   se ano_nasc > 2026 entao
      escreva("Ano de nascimento inválido.")
   senao
      idade <- 2026 - ano_nasc
      decadas <- idade / 10
      milenios <- idade / 1000
      mes <- idade * 12
      semanas <- idade * 52
      dias <- idade * 365
      horas <- dias * 24
      minutos <- horas * 60
      segundos <- minutos * 60
      milesimo <- segundos *60
      microsegundo <- milesimo * 1000
      nanossegundo <- microsegundo * 1000
      picossegundo <- nanossegundo * 1000

      escreval("Sua idade em milenios: ", milenios)
      escreval("Sua idade em decadas: ", decadas)
      escreval("Sua idade aproximada: ", idade)
      escreval("Sua idade em meses: ", mes)
      escreval("Sua idade em semanas: ", semanas)
      escreval("Sua idade em dias: ", dias)
      escreval("Sua idade em horas: ", horas)
      escreval("Sua idade em minutos: ", minutos)
      escreval("Sua idade em segundos aproximadamente: ", segundos)
      escreval("Sua idade em milesimos aproximdamente: ", milesimo)
      escreval("Sua idade em microssegundos aproximadamente: ", microssegundo)
      escreval("Sua idade em nanossegundos aproximadamente: ", nanossegundo)
      escreval("Sua idade em picossegundos aproximadamente: ", picossegundo)
   fimse

fimalgoritmo
