# Arborescence intervallaire
Représentation intervallaire des arbres
----
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e8b1e0a1-da1c-4be2-9716-cc84acf1a38d/mini.png)](https://insight.sensiolabs.com/projects/e8b1e0a1-da1c-4be2-9716-cc84acf1a38d)
[![Build Status](https://travis-ci.org/Alexandre-T/tree.svg?branch=master)](https://travis-ci.org/Alexandre-T/tree)
[![Coverage Status](https://coveralls.io/repos/github/Alexandre-T/tree/badge.svg?branch=master)](https://coveralls.io/github/Alexandre-T/tree?branch=master)
----

Pour éviter des autojointures et de la récursivité de requête, 
[l'arborescence intervallaire](http://sqlpro.developpez.com/cours/arborescence/)
améliore efficacement le stockage et la recherche en base de données. Cette méthode 
est particulièrement utile pour stocker les fils d'Ariane 
ou les catégories imbriquées. [Frédéric Brouard](http://sqlpro.developpez.com/) a écrit un 
[article](http://sqlpro.developpez.com/cours/arborescence/) et considérablement
amélioré intrasèquement les requêtes SQL exécutés, mais ce processus permet surtout de
diminuer dratiquement le nombre de requête nécessaire pour obtenir les tuples souhaités.

Cette image extraite de son article présente une arborescence intervallaire:
![Exemple d'arbre stocké sous forme d'arborescence intervallaire](http://sqlpro.developpez.com/cours/arborescence/images/SQLtree3.gif)

Pour résumer, pour obtenir tous les descendants de `terrestre`, il suffit d'une requête pour récupérer 
tous les tuples dont les bornes sont comprises entre celles de `terrestre`, c'est-à-dire entre
 `22` et `36`.

Dans sa version 1.0, ce bundle permettra de récupérer un ensemble d'entités rapidement.
Dans sa version 2.0, ce bundle permettra également de manipuler les entités (ajout, modification, suppression)

Comment utiliser ce paquet ?
----
Si vous avez une entité devant être stockée par arborescence intervallaire, il vous suffit de créer une entité héritant de AbstractTree
Ensuite pour manipuler ces entités (ajout, suppression, etc...) il vous suffit de faire appel au TreeManager. Il fera appel au TreeRepository
et lèvera des exceptions TreeException en cas d'erreur.

Cette documentation va évoluer rapidement. Je recherche un traducteur vers l'anglais.
