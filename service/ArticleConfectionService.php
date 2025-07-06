<?php
require_once "./../model/ArticleConfection.php";
require_once "./../repositories/ArticleConfectionRepository.php";
class ArticleConfectionService{

    private ArticleConfectionRepository $articleConfectionRepository;
    private const LIMIT=2;

    public function __construct(){
        $this->articleConfectionRepository = new ArticleConfectionRepository();
    }

    public function listerArticleConfection(): array{
        return $this->articleConfectionRepository->selectAllArticleConfection();
    }

    public function addArticleConfection(ArticleConfection $articleConfection): void{
        $this->articleConfectionRepository->insertArticleConfection($articleConfection);
    }

    public function searchArticleConfectionbyId(string $id): ArticleConfection|null{
        return $this->articleConfectionRepository->selectArticleConfectionById($id);
    }

    public function getArticle(string $articleConfectionName):int{
        $articleConfections=[];
        $articleConfections=$this->listerArticleConfection();
        foreach($articleConfections as $articleConfection){
            if($articleConfection->getLibelle()==$articleConfectionName){
                return $articleConfection->getId();
            }
        }
        return 0;
    }

    public function updateArticleConfection(ArticleConfection $articleConfection):void{
        $numUpdate=$this->articleConfectionRepository->updateArticleConfe($articleConfection);
    }


    public function  getNbrePage():int {
        $totalElement=$this->articleConfectionRepository->count();
        return ceil( $totalElement/self::LIMIT);
    }

    private function generateNumero():string{
        $lastId=$this->articleConfectionRepository->selectLastInsertId();
        return $lastId+1;
    }

}