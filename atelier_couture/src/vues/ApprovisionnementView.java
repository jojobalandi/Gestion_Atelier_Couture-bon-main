package vues;

import data.entites.Approvisionnement;
import data.entites.ArticleConfection;
import data.entites.Fournisseur;
import services.ApprovisionnementService;
import services.ArticleConfectionService;
import services.FournisseurService;

import java.util.ArrayList;
import java.util.List;

public class ApprovisionnementView extends AbstractView{

    private ApprovisionnementService approvisionnementService;
    private FournisseurService fournisseurService;
    private ArticleConfectionService articleConfectionService;

    public void creerApprovisionnement(){
        Approvisionnement approvisionnement = new Approvisionnement();
        List<Fournisseur> fournisseurs = fournisseurService.getAll();
        List<ArticleConfection> articleConfections = articleConfectionService.getAll();
        for (int i = 0; i < fournisseurs.size(); i++) {
            System.out.println(fournisseurs.get(i));
        }
        System.out.print("choisir fournisseur ? ");
        int fournisseurchoissi=scanner.nextInt();
        for (int i = 0; i < fournisseurs.size(); i++) {
            if(fournisseurchoissi==fournisseurs.get(i).getId()){
                approvisionnement.setFournisseur(fournisseurs.get(i));
                break;
            }
        }

        for (int i = 0; i < articleConfections.size(); i++) {
            System.out.println(articleConfections.get(i));
        }

        System.out.print("choisir Article ? ");
        int articlechoissi=scanner.nextInt();
        for (int i = 0; i < articleConfections.size(); i++) {
            if(articlechoissi==articleConfections.get(i).getId()){
                approvisionnement.setArticleConfection(articleConfections.get(i));
                break;
            }
        }
        System.out.print("nouvelle qte Stock ? ");
        int nouvelleqteStock=scanner.nextInt();
        approvisionnement.setQteStock(nouvelleqteStock);

        //montantavant+montantactuel=qteStock*prixunitaire
        for (int i = 0; i < articleConfections.size(); i++) {
            if(articlechoissi==articleConfections.get(i).getId()){
                articleConfections.get(i).setQteStock(articleConfections.get(i).getQteStock()+nouvelleqteStock);
                approvisionnement.setMontActuelStock(articleConfections.get(i).getPrixAchat()*nouvelleqteStock);
                articleConfections.get(i).setMontStock(articleConfections.get(i).getMontStock()+approvisionnement.getMontActuelStock());
                break;
            }
        }

        approvisionnementService.create(approvisionnement);
    }

    public void listerApprovisionnements(){
        for(Approvisionnement approvisionnement:approvisionnementService.getAll()){
            System.out.println(approvisionnement);
        }
    }

}
