package services.impl;

import data.entites.ArticleConfection;
import data.repositories.impl.ArticleConfectionRepositoryImpl;
import services.ArticleConfectionService;

import java.util.List;

public class ArticleConfectionServiceImpl implements ArticleConfectionService {
    private final ArticleConfectionRepositoryImpl articleConfectionRepository;

    public ArticleConfectionServiceImpl(ArticleConfectionRepositoryImpl articleConfectionRepository) {
        this.articleConfectionRepository = articleConfectionRepository;
    }


    @Override
    public ArticleConfection create(ArticleConfection articleConfection) {
        return articleConfectionRepository.save(articleConfection);
    }

    @Override
    public List<ArticleConfection> getAll() {
        return articleConfectionRepository.findAll();
    }

    @Override
    public ArticleConfection approvi(ArticleConfection articleConfection) {
        return null;
    }
}
