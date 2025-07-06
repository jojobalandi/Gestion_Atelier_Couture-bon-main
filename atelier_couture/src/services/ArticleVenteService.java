package services;

import data.entites.ArticleConfection;
import data.entites.ArticleVente;

import java.util.List;

public interface ArticleVenteService {
    ArticleVente create(ArticleVente articleVente);
    List<ArticleVente> getAll();
    ArticleVente approvi(ArticleVente articleVente);
}
