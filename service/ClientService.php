<?php
require_once "./../model/Client.php";
require_once "./../repositories/ClientRepository.php";
class ClientService{
    private ClientRepository $clientRepository;
    private const LIMIT=2;

    public function __construct(){
        $this->clientRepository = new ClientRepository();
    }

    //listerClient==>selectAllClient
    //addClient==>insertClient
    //miseAJourClient==>updateClient

    public function listerClient(): array{
        return $this->clientRepository->selectAllClient();
    }

    public function addClient(Client $client): void{
        $this->clientRepository->insertClient($client);
    }

    public function searchClientbyId(string $id): Client|null{
        return $this->clientRepository->selectClientById($id);
    }

    public function  getNbrePage():int {
        $totalElement=$this->clientRepository->count();
        return ceil( $totalElement/self::LIMIT);
    }

    private function generateNumero():string{
        $lastId=$this->clientRepository->selectLastInsertId();
        return $lastId+1;
    }



}