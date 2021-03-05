<?php



class UtilisateurManager
{
    private ?PDO $db;

    /**
     * UtilisateurManager constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }

    /**
     * @return array
     */
    public function getUsers(): array{
        $users = [];
        $conn = $this->db->prepare("SELECT * FROM utilisateur");
        if($conn->execute()){
            foreach($conn->fetchAll() as $item){
                $user = new Utilisateur($item["id"]);
                $user
                    ->setId($item["id"])
                    ->setFirstName($item["firstName"])
                    ->setLastName($item["lastName"])
                    ->setMail($item["mail"])
                    ->setPass($item["password"])
                ;
                $users[] = $user;
            }
        }
        return $users;
    }

    /**
     * @param Utilisateur $user
     * @return bool
     */
    public function insert(Utilisateur $user): bool {
        if(is_null($user->getId())){
            $conn = $this->db->prepare("
                INSERT INTO utilisateur (firstName, lastName, mail, password) VALUES  ( :firstName, :lastName, :mail, :password)
            ");

            $conn->bindValue(":firstName", $user->getFirstName());
            $conn->bindValue(":lastName", $user->getLastName());
            $conn->bindValue(":mail", $user->getMail());
            $conn->bindValue(":password", $user->getPass());

            return $conn->execute();
        }
        return false;
    }

}