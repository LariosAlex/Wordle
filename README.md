# WordleAPU

Aquest projecte tracta de replicar el joc WORDLE "https://lapalabradeldia.com/".

## COM ES EL PROJECTE

 Per començar, et trobes a l'inici i has de posar un nom d'usuari, després d'això pitges el botó de jugar i vas a la pantalla de joc, on hauràs d'endevinar una paraula secreta escrivint-la amb el teclat digital d'aquesta pàgina, tindràs cinc intents en els quals després d'enviar-la, les lletres es tornaran verdes si estan a la posició correcta, grogues si es troben a la paraula, però no es troben al lloc correcte i grises si no es troben a la paraula, si encertes la paraula en aquests intents se t'enviarà a la pantalla de victòria, si no acabaràs a la pàgina de derrota.

## INSTALACIO I DESPLEGAMENT DEL PROJECTE

### WINDOWS

Primer hauràs de descarregar l'aplicació "Ubuntu22.04.04.1 LTS" que et simula una terminal d'ubuntu dins de l'ordinador Windows, on tindràs que instal·lar:
    
    Abans de la instal·lació es recomana fer una actualizacio "sudo apt update"
    · PHP "sudo apt install php"
    · Apache2 "sudo apt install apache2"

Després d'instal·lar aquests programes, tindràs que obrir la carpeta on està l'ubuntu per fer-ho utilitza el comand "explorer.exe ." a la terminal d'ubuntu, i a aquesta carpeta fas el git clone "git clone https://github.com/LariosAlex/WordleAPU.git".

Després d'haver clonat el projecte només hauràs de posar a la terminal d'ubuntu "cd WordleAPU" per anar a dins del projecte, i quan et trobis a la carpeta hauràs de posar "php -s 0:8080". I amb això a qualsevol navegador "chrome, mozilla" si poses a l'adreça web "localhose:8080" ja estaràs dins del joc.


### UBUNTU

Primer hauras d'instalar:

    Abans de la instal·lació es recomana fer una actualizacio "sudo apt update"
    · PHP "sudo apt install php"
    · Apache2 "sudo apt install apache2"

Després d'instal·lar aquests programes, has de fer el git clone "git clone https://github.com/LariosAlex/WordleAPU.git" a la carpeta on vulguis tenir el projecte descarregat.

Després d'haver clonat el projecte hauràs d'obrir la consola des de la carpeta del projecte i posar "php -s 0:8080". I amb això a qualsevol navegador si poses a l'adreça web "localhose:8080" ja estaràs dins del joc.