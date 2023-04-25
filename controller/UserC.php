<?php

include "../model/user.php";
include "../config.php";


class UserC {
    public function create(User $user) {
        $db = config::getConnexion();
        $stmt = $db->prepare("INSERT INTO user (id,fullname,phone,password,email,gender,created_at,profile_pic,adresse,dateofbirth) VALUES (:id, :fullname, :phone, :password, :email, :gender, :created_at, :profile_pic, :adresse, :dateofbirth)");
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':fullname', $user->getFullname());
        $stmt->bindValue(':phone', $user->getPhone());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':gender', $user->getGender());
        $stmt->bindValue(':created_at', $user->getCreatedAt());
        $stmt->bindValue(':profile_pic', $user->getProfilePic());
        $stmt->bindValue(':adresse', $user->getAdresse());
        $stmt->bindValue(':dateofbirth', $user->getDateOfBirth());
        $stmt->execute();
        $user->setId($db->lastInsertId());
        return $user;
      }
    
      public function login ($email) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
  
    function verifyCredentials($email, $password) {
            $db = config::getConnexion();
            $stmt = $db->prepare('SELECT * FROM user WHERE email = :email AND is_deleted = 0 LIMIT 1');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($user && password_verify($password, $user['password'])) {
                // Password is correct, so return the user's ID
                return $user['id'];
            } else {
                // Invalid credentials
                return false;
            }
        }
    
        public function getUserByEmail($email) {
            $db = config::getConnexion();
            $stmt = $db->prepare('SELECT * FROM user WHERE email = :email');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if (!$userData) {
                return null; // User not found
            }
        
            $user = new User();
            $user->setId($userData['id']);
            $user->setfullname($userData['fullname']);
            $user->setPhone($userData['phone']);
            $user->setPassword($userData['password']);
            $user->setEmail($userData['email']);
            $user->setGender($userData['gender']);
            $user->setRole($userData['role']);
            $user->setProfilePic($userData['profile_pic']);
            $user->setadresse($userData['adresse']);
        
            return $user;
        }
        public function getUserByUsername($email) {
            $db = config::getConnexion();
            $stmt = $db->prepare('SELECT fullname FROM user WHERE email = :email');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user['fullname'];
        }
        public function getUserByProfilePic($email) {
            $db = config::getConnexion();
            $stmt = $db->prepare('SELECT profile_pic FROM user WHERE email = :email');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user['profile_pic'];
        }
    
    }

   



























?>