package vues;

import data.entites.Categorie;
import services.CategorieService;

public class CategorieView extends AbstractView{
    private final CategorieService categorieService;

    public CategorieView(CategorieService categorieService) {
        this.categorieService = categorieService;
    }

    public void creerCategorie(){
        System.out.println("Nom de la catégorie ?");
        Categorie categorie = new Categorie();
        String nomCategorie = scanner.nextLine();
        categorie.setLibelle(nomCategorie);
        categorieService.create(categorie);
    }

    public void listerCategorie(){
        for (Categorie categorie : categorieService.getAll()){
            System.out.println(categorie);
        }
    }
}
