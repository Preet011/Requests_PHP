<?php
// Information ou rappel: On echappe pas de données qui sont déstinées à la BDD pour plusieurs raisons : 

// 1 - La BDD n'en a pas besoin 
// 2 - Les requêtes préparées sont là pour ça (echapper les données et sécuriser contre les injections SQL)

// En revanche on echappe TOUJOURS lors de l'affichage de données

/** Exercice 1 : Validation de l'email
 * 
 *  Objectif : Ajouter un champ pour l'adresse e-mail dans le formulaire et valider que l'email est bien formaté avant de l'enregistrer dans la BDD
 *             Ajouter également l'email dans la BDD (vider les données avant) dans la table employes
 *  
 * 
 *  1 . Ajouter la validation dans le code PHP pour vérifier que l'email est valide
 */


/** Exercice 2 : Validation numero téléphone
 * 
 *  Objectif : Ajouter un champ pour le numéro de téléphone
 *             Ajouter également dans la BDD dans la table employes
 * 
 * 
 *  1 . Valider qu'il contient uniquement des chiffres et contient entre 10 et 20 caractères
 * 
 */

/** Exercice 3 : Valider le genre en menu déroulant
 * 
 *  Objectif : Validation du genre des employés
 * 
 * 
 *  1 . Vérifier que les valeurs correspondent dans le PHP et soient validées
 * 
 * 
 */

/** Exercice 4 : Validation de la date avec formatage avec preg_match()
 * 
 *  Objectif : S'assurer que la date est au format 'jj-mm-aaaa' et la transformer en 'aaaa-mm-jj'
 * 
 *  1 . Valider le format de la date FR 
 * 
 *  2 . Reformater le format en US (aaaa-mm-jj)
 * 
 */

/** Exercice 5 : Validation du salaire avec format monétaire avec preg_match()
 * 
 *  Objectif : Vérifier que le salaire est un montant monétaire valide (il ne peut pas être négatif par exemple)
 * 
 *  1 . Modifier la validation pour que le salaire soit un nombre positif avec jusqu'à 2 décimales
 * 
 *  2 . Utiliser des fonctions PHP vues en cours pour formater le salaire et le valider
 */


/** Exercice 6 : Validation de la longueur du nom d'utilisateur
 * 
 *  Objectif : Vérifier que le nom d'utilisateur a une longueur spécifique
 * 
 *  1 . Ajouter un champs dans le formulaire pour le nom d'utilisateur (username), dans la table employes egalement
 * 
 *  2 . Valider que l'utilisateur a entre 5 et 15 caractères
 * 
 * 
 */



/** Exercice 7 : Utilisation des requêtes préparées
 * 
 *  Objectif : S'assurer que toutes les requêtes SQL vers la BDD soient préparée pour éviter les injections SQL
 * 
 *  1 . Utiliser PDO pour assurer une connexion à la base de données
 *  2 . Préparer une requête SQL pour envoyer toutes les données du formulaire dans la BDD
 *  
 * 
 * 
 *  Aide : Voir cours sur PDO
 */


/** Exercice 8 : Ajouter photo profil (BONUS)
 * 
 *  Objectif : Ajouter une photo de profil à l'utilisateur (il faudra créer un nouveau formulaire 'modif user' et une requête UPDATE pour la BDD et non INSERT INTO), l'image doit être nullable
 *
 *  Attention : Ajouter enctype="multipart/form-data" au formulaire pour que ça fonctionne
 *  
 *  Faites des recherches sur $_FILES et la fonction move_uploaded_file()
 *  
 *  1 . Ajouter un champ pour ajouter des fichiers dans le formulaire
 * 
 *  2 . Traiter le champ dans PHP (ajouter une limite de taille de 20mb)
 * 
 *  3 . La photo uploadée doit être enregistrée dans un dossier img,photo comme vous voudrez
 * 
 *  4 . Une fois la vérification faite, l'enregistrée dans la BDD sur l'utilisateur souhaité, ne pas oublier de selectionner un utilisateur (par son id)
 */
