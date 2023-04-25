<?php
include '../config.php';
include_once '../model/article.php';
class articleC
{
	function recherche($idd)
    {
        $requete = "select * from article where id like '%$nom%'";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
	function triarticle()
        {
            $requete = "select * from article ORDER BY reference ";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
		
	function getarticlebyREFERENCE($reference )
        {
            $requete = "select * from article where reference =:reference ";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'reference '=>$reference 
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }	
	function triParprice_article()
        {
            $requete = "select * from article ORDER BY price";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    function afficherarticle()
    {
        $sql = "SELECT * FROM article";
        $db = config::getConnexion();
        try {
			$liste = $db->query($sql);
			return $liste;
		}catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
    }
    function supprimerarticle($reference )
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM article WHERE reference  =:reference 
                ');
                $querry->execute([
                    'reference'=>$reference 
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    function ajoutearticle($article)
	{
		$sql = "INSERT INTO article (reference,name,description,price) 
			VALUES ( :reference , :name, :description, :price)";
		$db = config::getConnexion();
		try {
            $query = $db->prepare($sql);
			$query->execute([
				'reference' => $article->getreference (),
				'name' => $article->getname(),
				'description' => $article->description(),
				'price' => $article->getprice(),
				
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    
	}
    function recupererarticle($reference)
	{
		$sql = "SELECT * from article where reference =$reference ";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$article = $query->fetch();
			return $article;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}


}

function modifierarticle($article, $reference )
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE article  SET 
                    name=:name, 
                    description=:description, 
					price=:price,
                   
                    
                WHERE reference = :reference  '
        );
        $query->execute([
            'reference ' => $article->getreference (),
				'name' => $article->getname(),
				'description' => $article->getdescription(),
				'price' => $article->getprice(),
				
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    
    }


}

 }
?>