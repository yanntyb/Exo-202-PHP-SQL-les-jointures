<?php
include "./Classes/DB.php";
include "./Entity/Article.php";
include "./Manager/ArticleManager.php";

include "./Entity/Utilisateur.php";
include "./Manager/UtilisateurManager.php";

include "./Entity/Commentaire.php";
include "./Manager/CommentaireManager.php";

/**
 * 1. Commencez par importer le script SQL disponible dans le dossier SQL.
 * 2. Connectez vous à la base de données blog.
 */

$conn = new DB();
$articleManager = new ArticleManager();
$articles = $articleManager->getArticle();

$userManager = new UtilisateurManager();

$commentManager = new CommentaireManager();


/**
 * 3. Sans utiliser les alias, effectuez une jointure de type INNER JOIN de manière à récupérer :
 *   - Les articles :
 *     * id
 *     * titre
 *     * contenu
 *     * le nom de la catégorie ( pas l'id, le nom en provenance de la table Categorie ).
 *
 * A l'aide d'une boucle, affichez chaque ligne du tableau de résultat.
 */

// TODO Votre code ici.

//foreach($articles as $article){
//    echo "<pre>";
//    print_r($articleManager->getCategory($article));
//    echo "<pre>";
//}

/**
 * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
 */

// TODO Votre code ici.


/**
 * 5. Ajoutez un utilisateur dans la table utilisateur.
 *    Ajoutez des commentaires et liez un utilisateur au commentaire.
 *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
 */

// TODO Votre code ici.

$newUser = new Utilisateur();
$newUser
    ->setPass("pass")
    ->setMail("mail")
    ->setFirstName("yann")
    ->setLastName("tyburczy");

$userManager->insert($newUser);

$users = $userManager->getUsers();

echo "<pre>";
print_r($users[0]);
print_r($articles[0]);
echo "</pre>";

$comment = new Commentaire();
$comment
    ->setContent("mon commentaire");

$commentManager->insert($users[0],$comment,$articles[0]);