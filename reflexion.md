Les pages seront divisée en deux colonnes, une avec la liste des articles
 (ou simple liste avec les sujets) qui prendra 80% de la page.
 La deuxième colonne contiendra les catégories ?, un espace pour décrire
 le blog ou la personne qui l'utilise, etc.
 
 (??? faire une nav avec les catégories)

Sur la page index :

Affichage des articles

Articles :
Date de création de l'article, titre/sujet, sa catégorie, contenu, 
nom de l'auteur et espace de commentaire (avec message, date de publication 
et nom de l'auteur)

Espace admin

Possibilité de changer le titre du blog, écrire une présentation qui 
apparaîtra dans le menu de gauche, écrire son nom/pseudo, 
création de catégorie

Espace membre ??? : changer son pseudo, mot de passe et adresse email

Espace commentaire : afficher le message, date de création et le nom de l'auteur

Bases de données :

une pour les articles, une pour les membres


Base de données articles : id, titre, date de création, auteur, contenu

Base de données membres : id, nom/pseudo, mot de passe, e-mail, statut 
(membre ou admin)

Base catégories : id, nom de la catégorie

Base liant les articles et les catégories : id, id article, id catégories

Base commentaires : id, message, date de création, auteur

Base liant les commentaires à des articles ??? : id, id articles, id commentaire