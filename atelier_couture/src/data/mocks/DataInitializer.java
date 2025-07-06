package data.mocks;

import data.entites.Compte;
import data.entites.Personne;
import data.enums.Role;
import data.repositories.CompteRepository;
import data.repositories.PersonneRepository;
import java.util.ArrayList;
import java.util.List;

public class DataInitializer{
    private final CompteRepository compteRepository;
    private final PersonneRepository personneRepository;

    public DataInitializer(CompteRepository compteRepository, PersonneRepository personneRepository) {
        this.compteRepository = compteRepository;
        this.personneRepository = personneRepository;
    }

    public void init() {
        List<Compte> comptes = new ArrayList<>();
        List<Personne> personnes = new ArrayList<>();
        for (int i = 1; i <= 10; i++) {
            Personne personne = new Personne();
            personne.setNom("Nom_" + i);
            personne.setPrenom("Prenom_ " + i);
            personne.setAdresse("Adresse_" + i);
            personne.setTelephone("77100101" + i);
            personnes.add(personne);
        }
        personneRepository.saveAll(personnes);

        for (Personne personne : personnes) {
            Compte compte = getCompte(personne);
            comptes.add(compte);
        }
        compteRepository.saveAll(comptes);
//        showData();
//        System.out.println("Données Créees avec succès");
    }

    private static Compte getCompte(Personne personne) {
        Compte compte = new Compte();
        compte.setUsername(personne.getNom());
        compte.setPassword(personne.getNom() + "123");
        if (personne.getId() < 2) {
            compte.setRole(Role.GESTIONNAIRE);
        } else if (personne.getId() < 5) {
            compte.setRole(Role.RESPONSABLE_STOCK);
        } else if (personne.getId() < 8) {
            compte.setRole(Role.RESPONSABLE_VENTE);
        } else {
            compte.setRole(Role.VENDEUR);
        }
        return compte;
    }

    private void showData() {
        for (Personne personne : personneRepository.findAll()){
            System.out.println(personne);
        }
        System.out.println();
        for (Compte compte : compteRepository.findAll()){
            System.out.println(compte);
        }
    }
}
