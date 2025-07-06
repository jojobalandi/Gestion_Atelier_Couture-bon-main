package vues;

import data.entites.ArticleVente;
import data.entites.Production;
import services.ArticleVenteService;
import services.ProductionService;

import java.util.List;

public class ProductionView extends AbstractView {
    private ProductionService productionService;
    private ArticleVenteService articleVenteService;

    public void creerProduction(){
        Production production = new Production();
        System.out.println("Observation ? ");
        String Observation=scanner.nextLine();
        production.setObservations(Observation);
        List<ArticleVente> articleVentes=articleVenteService.getAll();
        for (int i = 0; i < articleVentes.size(); i++) {
            System.out.println(articleVentes.get(i));
        }
        System.out.println("choisir ? ");
        int choice=scanner.nextInt();
        for (int i = 0; i < articleVentes.size(); i++) {
            if(articleVentes.get(i).getId()==choice){
                production.setArticleVente(articleVentes.get(i));
                break;
            }
        }
        System.out.println("qte Produit ? ");
        int qte=scanner.nextInt();
        production.setQteProduit(qte);
        for (int i = 0; i < articleVentes.size(); i++) {
            if(articleVentes.get(i).getId()==qte){
                articleVentes.get(i).setQteStock(articleVentes.get(i).getQteStock()+qte);//ajoutqte
                int montant=articleVentes.get(i).getQteStock()*articleVentes.get(i).getPrixVente();
                break;
            }
        }
        productionService.create(production);
    }

    public void listerProduction(){
        for (Production production : productionService.getAll()) {
            System.out.println(production);
        }
    }

}
