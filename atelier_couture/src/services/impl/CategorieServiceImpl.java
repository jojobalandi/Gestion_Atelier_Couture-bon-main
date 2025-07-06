package services.impl;

import data.entites.Categorie;
import data.repositories.CategorieRepository;
import services.CategorieService;

import java.util.List;

public class CategorieServiceImpl implements CategorieService {
    private final CategorieRepository categorieRepository;

    public CategorieServiceImpl(CategorieRepository categorieRepository) {
        this.categorieRepository = categorieRepository;
    }

    @Override
    public Categorie create(Categorie categorie) {
        return categorieRepository.save(categorie);
    }

    @Override
    public List<Categorie> getAll() {
        return categorieRepository.findAll();
    }
}
