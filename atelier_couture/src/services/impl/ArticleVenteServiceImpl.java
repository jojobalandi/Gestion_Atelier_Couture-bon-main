package services.impl;

import data.entites.ArticleVente;
import data.repositories.ArticleVenteRepository;
import services.ArticleVenteService;

import java.util.List;

public class ArticleVenteServiceImpl implements ArticleVenteService {

    private final ArticleVenteRepository articleVenteRepository;

    public ArticleVenteServiceImpl(ArticleVenteRepository articleVenteRepository) {
        this.articleVenteRepository = articleVenteRepository;
    }

    @Override
    public ArticleVente create(ArticleVente articleVente) {
        return articleVenteRepository.save(articleVente);
    }

    @Override
    public List<ArticleVente> getAll() {
        return articleVenteRepository.findAll();
    }

    @Override
    public ArticleVente approvi(ArticleVente articleVente) {
        return null;
    }
}
