package services;

import data.entites.Production;
import data.entites.Vente;

import java.util.List;

public interface ProductionService {
    Production create(Production production);
    List<Production> getAll();
}
