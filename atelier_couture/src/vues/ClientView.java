package vues;

import data.entites.Client;
import services.ClientService;

public class ClientView extends AbstractView{

    private ClientService clientService;

    public void creerClient(){
        Client client = new Client();
        System.out.print("nom ? ");
        String nom = scanner.nextLine();
        client.setNom(nom);
        System.out.print("prenom ? ");
        String prenom = scanner.nextLine();
        client.setPrenom(prenom);
        System.out.println("Adresse ?");
        String adresse = scanner.nextLine();
        client.setAdresse(adresse);
        System.out.println("Telephone ?");
        String telephone = scanner.nextLine();
        client.setTelephone(telephone);
        clientService.create(client);
    }

    public void listerClient(){
        for(Client client:clientService.getAll()){
            System.out.println(client);
        }
    }

}
