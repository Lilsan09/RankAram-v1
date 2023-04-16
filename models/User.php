<?php
// appel du fichier config.php
require_once(__DIR__ . './../config/config.php');
require_once(__DIR__ . './../helpers/database.php');
require_once(__DIR__ . './../helpers/JWT.php');
// creation de la class User
class User
{
   // creation des attributs
   private $pdo;
   private $id;
   private $username;
   private $gameName;
   private $email;
   private $password;
   private $role;
   // private $createdAt;
   // private $updatedAt;
   // private $deletedAt;
   // creation du constructeur
   
   // creation des getters
      public function getId()
      {
         return $this->id;
      }
      public function getUsername()
      {
         return $this->username;
      }
      public function getGameName()
      {
         return $this->gameName;
      }
      public function getEmail()
      {
         return $this->email;
      }
      public function getPassword()
      {
         return $this->password;
      }
      public function getRole()
      {
         return $this->role;
      }
      // public function getCreatedAt()
      // {
      //    return $this->createdAt;
      // }
      // public function getUpdatedAt()
      // {
      //    return $this->updatedAt;
      // }
      // public function getDeletedAt()
      // {
      //    return $this->deletedAt;
      // }
   // creation des setters
      public function setId($id)
      {
         $this->id = $id;
      }
      public function setUsername($username)
      {
         $this->username = $username;
      }
      public function setGameName($gameName)
      {
         $this->gameName = $gameName;
      }
      public function setEmail($email)
      {
         $this->email = $email;
      }
      public function setPassword($password)
      {
         $this->password = $password;
      }
      public function setRole($role)
      {
         $this->role = $role;
      }
      // public function setCreatedAt($createdAt)
      // {
      //    $this->createdAt = $createdAt;
      // }
      // public function setUpdatedAt($updatedAt)
      // {
      //    $this->updatedAt = $updatedAt;
      // }
      // public function setDeletedAt($deletedAt)
      // {
      //    $this->deletedAt = $deletedAt;
      // }
   // Methode pour ajouter un utilisateur
      public function add(int $id = null)
      {
         $this->pdo = Database::getInstance();
         $sth = $this->pdo->prepare('INSERT INTO `users` (`username`, `email`, `password`) VALUES (:username, :email, :password)');
         $sth->bindValue(':username', $this->username, PDO::PARAM_STR);
         // $sth->bindValue(':gameName', $this->gameName, PDO::PARAM_STR);
         $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
         $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
         // $sth->bindValue(':role', $this->role, PDO::PARAM_STR);
         if ($sth->execute()) {
            if(is_null($id)) {
               $this->id = $this->pdo->lastInsertId();
            }
            if ($sth->rowCount() == 1 || !is_null($id)) {
               return $this;
            }
         }
      }
   // Méthode pour identifier un utilisateur grace a son email
      public static function loginByMail($email)
      {
         $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `email` = :email;');
         $sth->bindValue(':email', $email, PDO::PARAM_STR);
         if ($sth->execute()) {
            $result = $sth->fetch(PDO::FETCH_OBJ);
            if ($result) {
               return $result;
            }
         }
         return false;
      }
   // Methode pour verifier si l'adresse mail existe deja
      public static function checkEmail($email)
      {
         $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `email` = :email');
         $sth->bindValue(':email', $email, PDO::PARAM_STR);
         if ($sth->execute()) {
            $result = $sth->fetch(PDO::FETCH_OBJ);
            if ($result) {
               return $result;
            }
         }
         return false;
      }
   // Methode pour verifier si le pseudo existe deja
      public static function checkUsername($username)
      {
         $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `username` = :username');
         $sth->bindValue(':username', $username, PDO::PARAM_STR);
         if ($sth->execute()) {
            $result = $sth->fetch(PDO::FETCH_OBJ);
            if ($result) {
               return $result;
            }
         }
         return false;
      }
   // Methode pour afficher les information de l'utilisateur
      public static function getUserById($id)
      {
         $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `id` = :id');
         $sth->bindValue(':id', $id, PDO::PARAM_INT);
         if ($sth->execute()) {
            $result = $sth->fetch(PDO::FETCH_OBJ);
            if ($result) {
               return $result;
            }
         }
         return false;
      }
   // Methode pour supprimer une utilisateur
      public function delete()
      {
         $sth = Database::getInstance()->prepare('DELETE FROM `users` WHERE `id` = :id');
         $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
         if ($sth->execute()) {
            if ($sth->rowCount() == 1) {
               return true;
            }
         }
         return false;
      }
   // Methode pour lister tout les utilisateurs
      public static function getAllUsers()
      {
         $sth = Database::getInstance()->prepare('SELECT * FROM `users`');
         if ($sth->execute()) {
            $result = $sth->fetchAll(PDO::FETCH_OBJ);
            if ($result) {
               return $result;
            }
         }
         return false;
      }
   // Methode pour modifier un mot de passe
      public static function modifyPassword($id, $password)
      {
         $sth = Database::getInstance()->prepare('UPDATE `users` SET `password` = :password WHERE `Id_users` = :id');
         $sth->bindValue(':id', $id, PDO::PARAM_INT);
         $sth->bindValue(':password', $password, PDO::PARAM_STR);
         if ($sth->execute()) {
            $result = $sth->rowCount();
            return ($result >= 1) ? true : false;
         }
      }
   // Methode pour valider un utilisateur
      public static function validateAccount(int $id)
      {

         $pdo = Database::getInstance();
         $sql = "UPDATE users SET `valided_at` = NOW() WHERE `Id_users` = :id;";
         $sth = $pdo->prepare($sql);
         $sth->bindValue(':id', $id, PDO::PARAM_INT);
         if ($sth->execute()) {
            if ($sth->rowCount() == 1) {
               return true;
            }
         }
         return false;
      }
}
