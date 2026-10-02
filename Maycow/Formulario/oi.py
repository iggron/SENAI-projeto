atributos_validos = {
    "for": "Força",
    "agi": "Agilidade",
    "int": "Intelecto",
    "pre": "Presença",
    "vig": "Vigor"
}

meus_atributos = {
    "for": 1,
    "agi": 1,
    "int": 1,
    "pre": 1,
    "vig": 1
}

origens = {
    0: "none",
    1: "Acadêmico",
    2: "Agente de Saúde",
    3: "Amnésico",
    4: "Artista",
    5: "Atleta",
    7: "Chef",
    8: "Criminoso",
    9: "Cultista",
    10: "Desgarrado",
    11: "Engenheiro",
    12: "Executivo",
    13: "Investigador",
    14: "Lutador",
    15: "Magnata",
    16: "Mercenário",
    17: "Militar",
    18: "Operário",
    19: "Policial",
    20: "Religioso",
    21: "Servidor Público",
    22: "Conspiracionista",
    23: "TI",
    24: "Rural",
    25: "Trambiqueiro",
    26: "Universitário",
    27: "Animalista",
    28: "Astronauta",
    29: "Monstrofágico",
    30: "Colegial",
    31: "Cosplayer",
    32: "Diplomata",
    33: "Espírito",
    34: "Experimento",
    35: "Explorador",
    36: "Criaturas",
    37: "Fotógrafo",
    38: "Inventor",
    39: "Místico",
    40: "Legista",
    41: "Mateiro",
    42: "Mergulhador",
    43: "Motorista",
    44: "Nerd",
    45: "Profetizado",
    56: "Repórter"
}
origem = origens[0]

classes = {
    0: "none",
    1: "combatente",
    2: "especialista",
    3: "ocultista"
}
classe = classes[0]

pericias = {
    1: "Acrobacia",
    2: "Adestramento",
    3: "Artes",
    4: "Atletismo",
    5: "Atualidades",
    6: "Ciências",
    7: "Crime",
    8: "Diplomacia",
    9: "Enganação",
    10: "Fortitude",
    11: "Furtividade",
    12: "Iniciativa",
    13: "Intimidação",
    14: "Intuição",
    15: "Investigação",
    16: "Luta",
    17: "Medicina",
    18: "Ocultismo",
    19: "Percepção",
    20: "Pilotagem",
    21: "Pontaria",
    22: "Profissão",
    23: "Reflexos",
    24: "Religião",
    25: "Sobrevivência",
    26: "Tática",
    27: "Tecnologia",
    28: "Vontade",
}

minhas_pericias = {
    "Acrobacia": 0,
    "Adestramento": 0,
    "Artes": 0,
    "Atletismo": 0,
    "Atualidades": 0,
    "Ciências": 0,
    "Crime": 0,
    "Diplomacia": 0,
    "Enganação": 0,
    "Fortitude": 0,
    "Furtividade": 0,
    "Iniciativa": 0,
    "Intimidação": 0,
    "Intuição": 0,
    "Investigação": 0,
    "Luta": 0,
    "Medicina": 0,
    "Ocultismo": 0,
    "Percepção": 0,
    "Pilotagem": 0,
    "Pontaria": 0,
    "Profissão": 0,
    "Reflexos": 0,
    "Religião": 0,
    "Sobrevivência": 0,
    "Tática": 0,
    "Tecnologia": 0,
    "Vontade": 0
}

def escolher_atributos():
    pontos = 4
    for sigla, nome in atributos_validos.items():
        distribuicao = int(input(f"\nQuantos pontos deseja colocar em {nome} ({sigla})? "))
        if distribuicao > pontos or distribuicao < 0:
            print("Pontos insuficientes.")
        else:
            meus_atributos[sigla] += distribuicao
            pontos -= distribuicao
    return meus_atributos

def escolher_origem():
    for numero, nome in origens.items():
        if numero != 0:
            print(f"{numero} - {nome}")
    while True:
        escolha = int(input("\nDigite o número da origem que deseja ter: "))
        if escolha not in origens or escolha == 0:
            print("Origem inválida, tente novamente.")
        else:
            origem = origens[escolha]
            break
    return origem

def escolher_classe():
    for numero, nome in classes.items():
        if numero != 0:
            print(f"{numero} - {nome}")
    while True:
        escolha = int(input("\nDigite o número da classe que deseja ter: "))
        if escolha not in classes or escolha == 0:
            print("Classe inválida, tente novamente.")
        else:
            break
    return escolha

def definir_nex():
    nivel = int(input("\nDigite quantos de nex você quer ter (1 á 20): "))
    if nivel == 20:
        nex = 99
    else:
        nex = 5 * nivel

    return nex, nivel

def definir_pv(classe, nivel):
    if classe == 1:
        pv = (20 + meus_atributos["vig"]) + (4+meus_atributos["vig"]) * (nivel-1)
    elif classe == 2:
        pv = (16 + meus_atributos["vig"]) + (3+meus_atributos["vig"]) * (nivel-1)
    elif classe == 3:
        pv = (12 + meus_atributos["vig"]) + (2+meus_atributos["vig"]) * (nivel-1)

    return pv

def definir_pe(classe, nivel):
    if classe == 1:
        pe = (2 + meus_atributos["pre"]) + (2+meus_atributos["pre"]) * (nivel-1)
    elif classe == 2:
        pe = (3 + meus_atributos["pre"]) + (3+meus_atributos["pre"]) * (nivel-1)
    elif classe == 3:
        pe = (4 + meus_atributos["pre"]) + (4+meus_atributos["pre"]) * (nivel-1)

    return pe

def definir_san(classe, nivel):
    if classe == 1:
        san = 12 + (3 * (nivel-1))
    elif classe == 2:
        san = 16 + (4 * (nivel-1))
    elif classe == 3:
        san = 20 + (5 * (nivel-1))

    return san

def definir_def():
    defesa = 10 + meus_atributos["agi"]

    return defesa

# mostrar pericias
def mostrar_pericias():
    for numero, nome in pericias.items():
            if numero != 0:
                print(f"{numero} - {nome}")

def escolher_pericias():
    if classe == 1:
        fixo1 = int(input("\nDigite qual pericia fixa você prefere entre luta(1) ou pontaria(2): "))
        if fixo1 == 1:
            minhas_pericias["Luta"] = 5
        elif fixo1 == 2:
            minhas_pericias["Pontaria"] = 5
        fixo2 = int(input("Digite qual pericia fixa você prefere entre reflexo(1) ou fortitude(2)"))
        if fixo2 == 1:
            minhas_pericias["Reflexos"] = 5
        elif fixo2 == 2:
            minhas_pericias["Fortitude"] = 5

        mostrar_pericias()
        for i in range(1+meus_atributos["int"]):
            escolha = input("\nDigite o nome da pericia que deseja tem de forma livre:").capitalize()
            if escolha in minhas_pericias:
                minhas_pericias[escolha] = 5

    elif classe == 2:
        mostrar_pericias()
        for i in range(7+meus_atributos["int"]):
            escolha = input("\nDigite o nome da pericia que deseja tem de forma livre:").capitalize()
            if escolha in minhas_pericias:
                minhas_pericias[escolha] = 5

    elif classe == 3:
        minhas_pericias["Ocultismo"] = 5
        minhas_pericias["Vontade"] = 5
        mostrar_pericias()
        for i in range(3+meus_atributos["int"]):
            escolha = input("\nDigite o nome da pericia que deseja tem de forma livre:").capitalize()
            if escolha in minhas_pericias:
                minhas_pericias[escolha] = 5

def mostrar_ficha(origem, classe, nex, nivel):
    pv = definir_pv(classe, nivel)
    pe = definir_pe(classe, nivel)
    san = definir_san(classe, nivel)
    defesa = definir_def()

    nome_classe = classes[classe]

    print("\n")
    print("=" * 60)
    print("                 FICHA DO PERSONAGEM")
    print("=" * 60)

    print("\n--- INFORMAÇÕES ---")
    print(f"Origem: {origem}")
    print(f"Classe: {nome_classe.title()}")
    print(f"NEX: {nex}%")
    print(f"Nível: {nivel}")

    print("\n--- ATRIBUTOS ---")

    for sigla, nome in atributos_validos.items():
        valor = meus_atributos[sigla]
        print(f"{nome:<12} ({sigla.upper():>3}): {valor}")

    print("\n--- RECURSOS ---")
    print(f"PV  (Pontos de Vida): {pv}")
    print(f"PE  (Pontos de Esforço): {pe}")
    print(f"SAN (Sanidade): {san}")
    print(f"DEF (defesa): {defesa}")

    print("\n--- PERICIAS ---")
    for nome, modificador in minhas_pericias.items():
        print(f"{nome} = +{modificador}")

    print("\n" + "=" * 60)
    print("              FIM DA FICHA")
    print("=" * 60)

origem = escolher_origem()
classe = escolher_classe()
nex, nivel = definir_nex()
escolher_atributos()
escolher_pericias()

mostrar_ficha(origem, classe, nex, nivel)