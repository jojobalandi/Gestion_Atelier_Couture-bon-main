package services;

import data.entites.Categorie;

import java.util.List;

public interface CategorieService {
    Categorie create(Categorie categorie);
    List<Categorie> getAll();
}
