import data.entites.Compte;
import data.mocks.DataInitializer;
import data.repositories.CategorieRepository;
import data.repositories.CompteRepository;
import data.repositories.PersonneRepository;
import data.repositories.impl.CategorieRepositoryImpl;
import data.repositories.impl.CompteRepositoryImpl;
import data.repositories.impl.PersonneRepositoryImpl;
import services.CategorieService;
import services.CompteService;
import services.impl.CategorieServiceImpl;
import services.impl.CompteServiceImpl;
import vues.*;

import java.util.Scanner;

public class Main {
    private static final Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
//        Hydratation du scanner
        AbstractView.setScanner(scanner);
        CompteRepository compteRepository = new CompteRepositoryImpl();
        PersonneRepository personneRepository = new PersonneRepositoryImpl();
        DataInitializer dataInitializer = new DataInitializer(compteRepository, personneRepository);
        dataInitializer.init();
        CompteService compteService = new CompteServiceImpl(compteRepository);
        CategorieRepository categorieRepository = new CategorieRepositoryImpl();
        CategorieService categorieService = new CategorieServiceImpl(categorieRepository);
        CategorieView categorieView = new CategorieView(categorieService);
        ApprovisionnementView approvisionnementView = new ApprovisionnementView();
        ArticleView articleView = new ArticleView();
        VenteView venteView = new VenteView();
        ProductionView productionView = new ProductionView();
        ClientView clientView=new ClientView();
        CompteView compteView = new CompteView();
        FournisseurView fournisseurView = new FournisseurView();
        Compte compte = null;
        int choix = 0;
        while (true) {
            compte = getLogin(compteService);
            while (compte != null) {
                switch (compte.getRole()) {
                    case VENDEUR -> {
                        choix = menuVendeur();
                        scanner.nextLine();
                        switch(choix){
                            case 1 -> venteView.creerVente();
                            case 2 -> venteView.listerVente();
                            case 3 -> articleView.listerArticleConfection();
                            case 4 -> articleView.listerArticleVente();
                            case 0 -> {
                                System.out.println("Déconnexion");
                                compte = null;
                            }
                            case -1 -> System.exit(0);
                        }
                    }
                    case GESTIONNAIRE -> {
                        choix = menuGestionnaire();
                        scanner.nextLine();
                        switch (choix) {
                            case 1 -> categorieView.creerCategorie();
                            case 2 -> categorieView.listerCategorie();
                            case 3 -> clientView.creerClient();
                            case 4 -> clientView.listerClient();
                            case 5 -> fournisseurView.creerFournisseur();
                            case 6 -> fournisseurView.listerFournisseur();
                            case 7 -> articleView.creerArticleConfection();
                            case 8 -> articleView.listerArticleConfection();
                            case 9 -> articleView.creerArticleVente();
                            case 10 -> articleView.listerArticleVente();
                            case 11 -> approvisionnementView.creerApprovisionnement();
                            case 12 -> approvisionnementView.listerApprovisionnements();
                            case 13 -> compteView.creerCompte();
                            case 14 -> compteView.listerComptes();
                            case 15 -> productionView.creerProduction();
                            case 16 -> productionView.listerProduction();
                            case 17 -> venteView.creerVente();
                            case 18 -> venteView.listerVente();
                            case 0 -> {
                                System.out.println("Déconnexion");
                                compte = null;
                            }
                            case -1 -> System.exit(0);
                        }
                    }
                    case RESPONSABLE_STOCK -> {
                        choix = menuResStock();
                        scanner.nextLine();
                        switch (choix) {
                            case 1 -> approvisionnementView.creerApprovisionnement();
                            case 2 -> approvisionnementView.listerApprovisionnements();
                            case 3 -> articleView.listerArticleConfection();
                            case 4 -> articleView.listerArticleVente();
                            case 0 -> {
                                System.out.println("Déconnexion");
                                compte = null;
                            }
                            case -1 -> System.exit(0);
                        }

                    }
                    case RESPONSABLE_VENTE -> {
                        choix = menuResPro();
                        scanner.nextLine();
                        switch (choix) {
                            case 1 -> productionView.creerProduction();
                            case 2 -> productionView.listerProduction();
                            case 3 -> articleView.listerArticleConfection();
                            case 4 -> articleView.listerArticleVente();
                            case 0 -> {
                                System.out.println("Déconnexion");
                                compte = null;
                            }
                            case -1 -> System.exit(0);
                        }
                    }
                }
            }
        }

    }

    private static Compte getLogin(CompteService compteService) {
        Compte compte;
        while (true) {
            System.out.print("Username : ");
            String username = scanner.nextLine();
            System.out.print("Password : ");
            String password = scanner.nextLine();
            compte = compteService.login(username, password);
            if (compte == null) {
                System.out.println("Wrong Credentials");
                System.out.println("Try Again !!!");
            } else {
                System.out.println(compte);
                System.out.println("Connected successfully");
                break;
            }
        }
        return compte;
    }

    private static int menuGestionnaire() {
        System.out.println("MENU GESTIONNAIRE");
        System.out.println("1. Créer categorie");
        System.out.println("2. Lister categories");
        System.out.println("3- Creer Client");
        System.out.println("4- lister Client");
        System.out.println("5- Creer Fournisseur");
        System.out.println("6- lister Fournisseur");
        System.out.println("7- Creer Article de confection");
        System.out.println("8- lister Article de confection");
        System.out.println("9- Creer Article de Vente");
        System.out.println("10- lister Article de Vente");
        System.out.println("11- Enregistrer Approvisionnement");
        System.out.println("12- lister Approvisionnement");
        System.out.println("13- Creer Compte");
        System.out.println("14- lister Compte");
        System.out.println("15- Enregistrer Production");
        System.out.println("16- lister Production");
        System.out.println("17- Enregistrer Vente");
        System.out.println("18- lister Vente");
        System.out.println("0. Déconnexion");
        System.out.println("-1. Quitter");
        return scanner.nextInt();

    }

    private static int menuVendeur() {
        System.out.println("Menu Vendeur");
        System.out.println("1. Enregistrer une vente");
        System.out.println("2. Lister une vente");
        System.out.println("3. Lister Article de confection");
        System.out.println("4. Lister Article de Vente");
        System.out.println("0. Déconnexion");
        System.out.println("-1. Quitter");
        return scanner.nextInt();
    }

    private static int menuResPro(){
        System.out.println("Menu Responsable Production");
        System.out.println("1. Enregistrer une production");
        System.out.println("2. Lister les  productions");
        System.out.println("3. Lister Article de confection");
        System.out.println("4. Lister Article de Vente");
        System.out.println("0. Déconnexion");
        System.out.println("-1. Quitter");
        return scanner.nextInt();
    }

    private static int menuResStock(){
        System.out.println("Menu Responsable Stock");
        System.out.println("1. Enregistrer un approvisionnement");
        System.out.println("2. Lister Les Approvisionnements");
        System.out.println("3. Lister Article de confection");
        System.out.println("4. Lister Article de Vente");
        System.out.println("0. Déconnexion");
        System.out.println("-1. Quitter");
        return scanner.nextInt();
    }

}
