package services.impl;

import data.entites.Production;
import data.repositories.ProductionRepository;
import services.ProductionService;

import java.util.List;

public class ProductionServiceImpl implements ProductionService {
    private final ProductionRepository productionRepository;

    public ProductionServiceImpl(ProductionRepository productionRepository) {
        this.productionRepository = productionRepository;
    }

    @Override
    public Production create(Production production) {
        return productionRepository.save(production);
    }

    @Override
    public List<Production> getAll() {
        return productionRepository.findAll();
    }
}
