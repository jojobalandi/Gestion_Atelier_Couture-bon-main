package services.impl;

import data.entites.Approvisionnement;
import data.repositories.ApprovisionnementRepository;
import services.ApprovisionnementService;

import java.util.List;

public class ApprovisionnementServiceImpl implements ApprovisionnementService {
    private final ApprovisionnementRepository approvisionnementRepository;

    public ApprovisionnementServiceImpl(ApprovisionnementRepository approvisionnementRepository) {
        this.approvisionnementRepository = approvisionnementRepository;
    }

    @Override
    public Approvisionnement create(Approvisionnement approvisionnement) {
        return approvisionnementRepository.save(approvisionnement);
    }

    @Override
    public List<Approvisionnement> getAll() {
        return approvisionnementRepository.findAll();
    }
}
