## RECENT
- Migration vers silex
	- Transformer les fonctions en classes

## A FAIRE

- Faire en sorte d'identifier de façon simple les zones où on execute une requete pour faciliter la maintenance 
- Assurer l'unicité des adresses emails
- Créer une page de création d'utilisateurs
- Revoir le code de la fonction redirect() utilser les redirection http:\\
- Régler les conflits de connexion à la base de données des fichier db_connect.php et db_auto_connect.php


## FAIT
- [x] S'assurer que lorsqu'un utilisateur est connecter il accède accède uniquement aux page auquelles il a accès.
- [x] Revoir les redirections(Gérer la redirection admin)


## Notes
- Aucune restriction sur le mot de passe
- Date inscription
- Cryptage de mot de passe à changer
- L'utilisateur des entièrement définit dans une varaible de session


## Système de filtre
Commme il y'a plusieurs utilisateurs(admin,membre,visiteur) l'idéal serais de créer des filtres pour chaque utilisateur et les pages auxquelles un utilisateurs a accès posséderont les filtres qui leur correspondent:

Filtres:
- VisitorFilter: Seul les visiteurs ont accès à la page
- MemberFilter: Seul les membres(utilisateurs connecté) ont accès à la page
- AdminFilter: Seul les administrateurs ont accès à la page

## Framework interne
- Organisation des dossiers
- Fichier de constantes
- Connexion à la base de données
- Redirection
- Filtres
- Gestion des urls
- Gestion des fichiers static
- Gestion des vues
- Système de notifications dynamique
