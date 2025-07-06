package vues;

import data.entites.ArticleVente;
import data.entites.Client;
import data.entites.Vente;
import services.ArticleVenteService;
import services.ClientService;
import services.VenteService;

import java.util.List;

public class VenteView extends AbstractView{

    private VenteService venteService;
    private ClientService clientService;
    private ArticleVenteService articleVenteService;

    public void creerVente(){
        Vente vente = new Vente();
        List<Client> clients=clientService.getAll();
        List<ArticleVente> articleVentes=articleVenteService.getAll();
        for (int i = 0; i < clients.size() ; i++) {
            System.out.println(clients.get(i));
        }
        System.out.println("Choisir client ?");
        int clientchoisit = scanner.nextInt();
        for (int i = 0; i < clients.size(); i++) {
            if (clientchoisit==clients.get(i).getId()){
                vente.setClient(clients.get(i));
                break;
            }
        }
        for (int i = 0; i < articleVentes.size(); i++) {
            System.out.println(articleVentes.get(i));
        }
        System.out.println("Choisir article vente ?");
        int articleventechoisit = scanner.nextInt();
        for (int i = 0; i < articleVentes.size(); i++) {
            if (articleventechoisit==articleVentes.get(i).getId()){
                vente.setArticleVente(articleVentes.get(i));
                break;
            }
        }
        System.out.println("Quantité de article vente ?");
        int articleventequant = scanner.nextInt();
        vente.setQteVendue(articleventequant);

        for (int i = 0; i < articleVentes.size(); i++) {
            if (articleventechoisit==articleVentes.get(i).getId()){
                if(articleVentes.get(i).getQteStock()==0 || articleVentes.get(i).getQteStock()<0 ){
                    System.out.println("quantité en stock épuisé");
                    System.out.println("on ne peut pas vendre");
                    break;
                }
                vente.setMontantVente(articleVentes.get(i).getPrixVente()*vente.getQteVendue());
                vente.setPrixUnitaire(articleVentes.get(i).getPrixVente());
                int quteActuel=articleVentes.get(i).getQteStock()-vente.getQteVendue();
                articleVentes.get(i).setQteStock(quteActuel);
                break;
            }
        }
        venteService.create(vente);
    }

    public void listerVente(){
        for (Vente vente : venteService.getAll()){
            System.out.println(vente);
        }
    }

}
