Fonctionnalités minimales : Gestionnaire BD

Voici la liste des fonctionnalités minimales de l’application, vous pouvez en rajouter autant que vous voulez en plus.
Avertissement : l’application est corrigée par un humain, pour le mettre de bonne humeur, pensez à la mettre en forme avec du style CSS.




. lister toutes les séries
	titre, nombre de tomes existants, lien pour voir la fiche

. pouvoir chercher les séries selon des mot-clés ou origine

.afficher une série au hasard

.ajouter/modifier/supprimer une série et un album (book)

sur la fiche d'une série
	toutes les infos et tous les albums correspondants
	ajouter un nouvel album 

sur la fiche d'un album 
	toutes les infos de cet album et de la série liée

------
ajouter la possibilité d'avoir une cover d'album 
	par défaut, image A

désignation d'un album pour représenter la série 
	par défaut, si rien n'est désigné, image par defaut B

-----
stats :
	nombre total d'albums 
	nombre total de séries 
	nombre total d'auteurs (avec leur nombre de participation)
	nombre de planches totales



	
Exemple de données : https://www.bedetheque.com/


Séries 
    constructors
    setters
    getters
        getAlbums() : [ Book ]
    all()

Book
    constructors
    setters
    getters
        getSerie : new Serie




Num = numéro du tome de la série

Cover = enregistrer l'image en local (chemin de l'image en bdd)

rep = boolean, si true l'épisode prend une image à part stocker en local et remonte dans série