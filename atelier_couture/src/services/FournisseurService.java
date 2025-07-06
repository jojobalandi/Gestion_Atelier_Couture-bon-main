package services;

import data.entites.Fournisseur;


import java.util.List;

public interface FournisseurService {
    Fournisseur create(Fournisseur fournisseur);
    List<Fournisseur> getAll();
}
