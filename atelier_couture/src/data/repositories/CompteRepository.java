package data.repositories;

import data.entites.Compte;

import java.util.List;

public interface CompteRepository  {
    Compte findByUsernameAndPassword(String username, String password);

    Compte save(Compte compte);
    void saveAll(List<Compte> comptes);
    List<Compte> findAll();
}
