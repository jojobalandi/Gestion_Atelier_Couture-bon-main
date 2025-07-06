package vues;

import data.entites.ArticleConfection;
import data.entites.ArticleVente;
import data.entites.Categorie;
import services.ArticleConfectionService;
import services.ArticleVenteService;
import services.CategorieService;

import java.util.List;

import static vues.AbstractView.scanner;

public class ArticleView {
    private ArticleVenteService articleVenteService;
    private ArticleConfectionService articleConfectionService;
    private CategorieService categorieService;


    public void creerArticleVente(){
        ArticleVente articleVente = new ArticleVente();
        System.out.println("Nom de la photo ?");
        String nomphoto = scanner.nextLine();
        articleVente.setPhoto(nomphoto);
        System.out.println("Libelle ?");
        String nomLibelle = scanner.nextLine();
        articleVente.setLibelle(nomLibelle);
        System.out.println("Qte Stock ?");
        int qteStock = scanner.nextInt();
        articleVente.setQteStock(qteStock);
        System.out.println("Montant de Vente ?");
        int MontVente = scanner.nextInt();
        articleVente.setMontVente(MontVente);
        System.out.println("Prix De Vente ?");
        int PrixAppro = scanner.nextInt();
        articleVente.setPrixVente(PrixAppro);
        List<Categorie> categories=categorieService.getAll();
        for (int i = 0; i < categories.size(); i++) {
            System.out.println(categories.get(i));
        }
        System.out.println("Choisir une catégorie ?");
        int categorie = scanner.nextInt();
        for (int i = 0; i < categories.size(); i++) {
            if (i==categorie){
                articleVente.setCategorie(categories.get(i));
                break;
            }
        }

        articleVenteService.create(articleVente);
    }

    public void listerArticleVente(){
        for (ArticleVente articleVente : articleVenteService.getAll()){
            System.out.println(articleVente.toString());
        }
    }

    public void creerArticleConfection(){
        ArticleConfection articleConfection = new ArticleConfection();
        System.out.println("Nom de la photo ?");
        String nomphoto = scanner.nextLine();
        articleConfection.setPhoto(nomphoto);
        System.out.println("Libelle ?");
        String nomLibelle = scanner.nextLine();
        articleConfection.setLibelle(nomLibelle);
        System.out.println("Montant d'Achat'?");
        int PrixAchat = scanner.nextInt();
        articleConfection.setPrixAchat(PrixAchat);
        System.out.println("Qte Achat ?");
        int qteAcaht = scanner.nextInt();
        articleConfection.setQteAchat(qteAcaht);
        articleConfection.setQteStock(qteAcaht);
        articleConfection.setMontStock(PrixAchat);
        List<Categorie> categories=categorieService.getAll();
        for (int i = 0; i < categories.size(); i++) {
            System.out.println(categories.get(i));
        }
        System.out.println("Choisir une catégorie ?");
        int categorie = scanner.nextInt();
        for (int i = 0; i < categories.size(); i++) {
            if (categorie==categories.get(i).getId()){
                articleConfection.setCategorie(categories.get(i));
                break;
            }
        }

        articleConfectionService.create(articleConfection);
    }

    public void listerArticleConfection(){
        for (ArticleConfection articleConfection : articleConfectionService.getAll()){
            System.out.println(articleConfection.toString());
        }
    }

}
