<?php

class Article extends Database
{
    public function getArticles()
    {
        $cnx = parent::getPDO();
        $sql = "SELECT * FROM articles WHERE state = 1";
        $query = $cnx->prepare($sql);
        $resp = $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }
   
    public function getArticle($idArticle)
    {
        $cnx = parent::getPDO();
        $sql = "SELECT * FROM articles WHERE id = :id";
        $query = $cnx->prepare($sql);
        $query->bindValue(':id', $idArticle);
        $query->execute();
        $articles = $query->fetch(PDO::FETCH_ASSOC);
        return $articles;
    }
   
    public function createArticle(ModelArticle $article)
    {
        $cnx = parent::getPDO();
        $sql = "INSERT INTO articles(id, title, description, state) VALUES (null,:title,:description,1)";
        $query = $cnx->prepare($sql);
        $query->bindValue(':title', $article->title);
        $query->bindValue(':description', $article->description);
        $resp = $query->execute();
        return $resp;
    }
   
    public function updateArticle(ModelArticle $article)
    {
        $cnx = parent::getPDO();
        $sql = "UPDATE articles SET title=:title,description=:description WHERE id=:id";
        $query = $cnx->prepare($sql);
        $query->bindValue(':title', $article->title);
        $query->bindValue(':description', $article->description);
        $query->bindValue(':id', $article->id);
        $resp = $query->execute();
        return $resp;
    }
   
    public function deleteArticle(ModelArticle $article)
    {
        $cnx = parent::getPDO();
        $sql = "UPDATE articles SET state=0 WHERE id=:id";
        $query = $cnx->prepare($sql);
        $query->bindValue(':id', $article->id);
        $resp = $query->execute();
        return $resp;
    }
}
