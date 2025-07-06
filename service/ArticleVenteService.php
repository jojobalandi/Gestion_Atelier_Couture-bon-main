<?php
require_once "./../model/ArticleVente.php";
require_once "./../repositories/ArticleVenteRepository.php";
class ArticleVenteService{
    private ArticleVenteRepository $articleVenteRepository;
    private const LIMIT=2;

    public function __construct(){
        $this->articleVenteRepository = new ArticleVenteRepository();
    }

    public function listerArticleVente(): array{
        return $this->articleVenteRepository->selectAllArticleVente();
    }

    public function addArticleVente(ArticleVente $articleVente): void{
        $this->articleVenteRepository->insertArticleVente($articleVente);
    }

    public function searchArticleVentebyId(string $id): ArticleVente|null{
        return $this->articleVenteRepository->selectArticleVenteById($id);
    }

    public function  getNbrePage():int {
        $totalElement=$this->articleVenteRepository->count();
        return ceil( $totalElement/self::LIMIT);
    }

    private function generateNumero():string{
        $lastId=$this->articleVenteRepository->selectLastInsertId();
        return $lastId+1;
    }

}