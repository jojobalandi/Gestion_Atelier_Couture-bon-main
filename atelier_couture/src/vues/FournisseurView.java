package vues;

import data.entites.Fournisseur;
import services.FournisseurService;

public class FournisseurView extends AbstractView{

    private FournisseurService fournisseurService;

    public void creerFournisseur(){
        Fournisseur fournisseur = new Fournisseur();
        System.out.print("nom ? ");
        String nom = scanner.nextLine();
        fournisseur.setNom(nom);
        System.out.print("prenom ? ");
        String prenom = scanner.nextLine();
        fournisseur.setPrenom(prenom);
        System.out.println("Adresse ?");
        String adresse = scanner.nextLine();
        fournisseur.setAdresse(adresse);
        System.out.println("Telephone ?");
        String telephone = scanner.nextLine();
        fournisseur.setTelephone(telephone);
        System.out.println("Telephone Fixe ?");
        String telephonefixe = scanner.nextLine();
        fournisseur.setTelFixe(telephonefixe);
        fournisseurService.create(fournisseur);
    }

    public void listerFournisseur(){
        for (Fournisseur fournisseur : fournisseurService.getAll()){
            System.out.println(fournisseur);
        }
    }


}
