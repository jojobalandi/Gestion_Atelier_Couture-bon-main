package vues;

import data.entites.Compte;
import data.enums.Role;
import services.CompteService;

public class CompteView extends AbstractView{

    private CompteService compteService;
    public void creerCompte(){
        Compte compte = new Compte();
        System.out.println("username ? ");
        String username=scanner.nextLine();
        compte.setUsername(username);
        System.out.println("password ? ");
        String password=scanner.nextLine();
        compte.setPassword(password);
        while(true){
            System.out.println("-------- Role -----------");
            System.out.println("1-Vendeur");
            System.out.println("2-Gestionnaire");
            System.out.println("3-Responsable stock");
            System.out.println("4-Responsable vente");
            System.out.println("choisir ? ");
            int choix=scanner.nextInt();
            if(choix==1){
                compte.setRole(Role.VENDEUR);
                break;
            }else if(choix==2){
                compte.setRole(Role.GESTIONNAIRE);
                break;
            }else if(choix==3){
                compte.setRole(Role.RESPONSABLE_STOCK);
                break;
            } else if (choix==4) {
                compte.setRole(Role.RESPONSABLE_VENTE);
                break;
            }else{
                System.out.println("choix incorrecte");
            }
        }
        compteService.create(compte);
    }

    public void listerComptes(){
        for(Compte compte : compteService.getAll()){
            System.out.println(compte);
        }
    }

}
