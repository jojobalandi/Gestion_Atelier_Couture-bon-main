package data.repositories.impl;

import data.entites.Production;
import data.repositories.ProductionRepository;

import java.util.ArrayList;
import java.util.List;

public class ProductionRepositoryImpl  implements ProductionRepository {
    private final List<Production> productions =  new ArrayList<>();

    @Override
    public Production save(Production production) {
        production.setId(productions.size() + 1);
        productions.add(production);
        return production;
    }

    @Override
    public List<Production> findAll() {
        return productions;
    }
}
