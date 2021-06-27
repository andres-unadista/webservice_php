<?php

header('Content-Type: application/json');

require_once './config/database.php';
require_once './models/articles.php';
require_once './models/interfaces/modelArticle.php';

$body = json_decode(file_get_contents('php://input'), true);


$article = new Article();

if (!isset($_GET['op'])) {
    echo 'Not found';
} else {
    switch ($_GET['op']) {
        case 'getAll':
            $articles = $article->getArticles();
            echo json_encode($articles);
            break;
        case 'getArticle':
            $idArticle = isset($body['id']) ? $body['id'] : null;
            if ($idArticle) {
                $articles = $article->getArticle($idArticle);
                echo json_encode($articles);
            } else {
                echo 'Not found param';
            }
            break;
        case 'createArticle':
            $title = isset($body['title']) ? $body['title'] : null;
            $description = isset($body['description']) ? $body['description'] : null;

            if (isset($title) && isset($description)) {
                $oArticle = new ModelArticle();
                $oArticle->title = $title;
                $oArticle->description = $description;
                $resp = $article->createArticle($oArticle);
                if ($resp) {
                    echo json_encode(['response' => 'Success, created']);
                }else{
                    echo json_encode(['response' => 'Not created']);
                }
            } else {
                echo 'Not found param';
            }
            break;
        case 'deleteArticle':
            $id = isset($body['id']) ? $body['id'] : null;

            if (isset($id)) {
                $oArticle = new ModelArticle();
                $oArticle->id = $id;
                $resp = $article->deleteArticle($oArticle);
                if ($resp) {
                    echo json_encode(['response' => 'Success, deleted']);
                }else{
                    echo json_encode(['response' => 'Not deleted']);
                }
            } else {
                echo 'Not found param';
            }
            break;
        default:
            echo 'Not found';
            break;
    }
}
