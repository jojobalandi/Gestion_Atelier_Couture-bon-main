package services;

import data.entites.Compte;

import java.util.List;

public interface CompteService {
    Compte login(String username, String password);
    Compte create(Compte compte);
    List<Compte> getAll();
    Compte update(Compte compte);
}
