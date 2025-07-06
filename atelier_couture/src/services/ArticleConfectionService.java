package services;

import data.entites.ArticleConfection;
import data.entites.ArticleVente;

import java.util.List;

public interface ArticleConfectionService {
    ArticleConfection create(ArticleConfection articleConfection);
    List<ArticleConfection> getAll();
    ArticleConfection approvi(ArticleConfection articleConfection);

}
