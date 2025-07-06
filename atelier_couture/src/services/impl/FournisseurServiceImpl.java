package services.impl;

import data.entites.Fournisseur;
import data.repositories.FournisseurRepository;
import services.FournisseurService;

import java.util.List;

public class FournisseurServiceImpl implements FournisseurService {

    private final FournisseurRepository fournisseurRepository;

    public FournisseurServiceImpl(FournisseurRepository fournisseurRepository) {
        this.fournisseurRepository = fournisseurRepository;
    }

    @Override
    public Fournisseur create(Fournisseur fournisseur) {
        return fournisseurRepository.save(fournisseur);
    }

    @Override
    public List<Fournisseur> getAll() {
        return fournisseurRepository.findAll();
    }
}
