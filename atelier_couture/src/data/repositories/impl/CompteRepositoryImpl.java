package data.repositories.impl;

import data.entites.Compte;
import data.repositories.CompteRepository;

import java.util.ArrayList;
import java.util.List;

public class CompteRepositoryImpl implements CompteRepository {
    private static final List<Compte> comptes =  new ArrayList<Compte>();

    @Override
    public Compte save(Compte compte) {
        compte.setId(comptes.size()+1);
        comptes.add(compte);
        return compte;
    }

    @Override
    public void saveAll(List<Compte> comptes) {
        for (Compte compte : comptes) {
            save(compte);
        }
    }

    @Override
    public List<Compte> findAll() {
        return comptes;
    }

    @Override
    public Compte findByUsernameAndPassword(String username, String password) {
        for (Compte compte : comptes) {
            if (compte.getUsername().equals(username)
                    && compte.getPassword().equals(password)) {
                return compte;
            }
        }
        return null;
    }
}
