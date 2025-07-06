package services;

import data.entites.Approvisionnement;

import java.util.List;

public interface ApprovisionnementService {
    Approvisionnement create(Approvisionnement approvisionnement);
    List<Approvisionnement> getAll();
}
