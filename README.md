# Arborescence intervallaire
Représentation intervallaire des arbres
----
Pour éviter des autojointures et de la récursivité de requête, 
[l'arborescence intervallaire](http://sqlpro.developpez.com/cours/arborescence/)
améliore efficacement le stockage et la recherche en base de données. Cette méthode 
est particulièrement utile pour stocker les fils d'Ariane 
ou les catégories imbriquées. [Frédéric Brouard](http://sqlpro.developpez.com/) a écrit un 
[fabuleux article](http://sqlpro.developpez.com/cours/arborescence/) et considérablement
amélioré intrasèquement les requêtes SQL exécutés, mais aussi leurs quantités.

Cette image extraite de son article présente une arborescence intervallaire:
![Exemple d'arbre stocké sous forme d'arborescence intervallaire](http://sqlpro.developpez.com/cours/arborescence/images/SQLtree3.gif)

Comment utiliser ce paquet ?
----
Si vous avez une entité devant être stockée par arborescence intervallaire, il vous suffit de créer une entité héritant de AbstractTree
Ensuite pour manipuler ces entités (ajout, suppression, etc...) il vous suffit de faire appel au TreeManager. Il fera appel au TreeRepository
et lèvera des exceptions TreeException en cas d'erreur.

Cette documentation va évoluer rapidement. Je recherche un traducteur vers l'anglais.
