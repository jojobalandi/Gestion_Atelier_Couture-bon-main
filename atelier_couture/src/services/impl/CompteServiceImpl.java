package services.impl;

import data.entites.Compte;
import data.repositories.CompteRepository;
import services.CompteService;

import java.util.List;

public class CompteServiceImpl implements CompteService {
    private final CompteRepository compteRepository;
    public CompteServiceImpl(CompteRepository compteRepository) {
        this.compteRepository = compteRepository;
    }
    @Override
    public Compte login(String username, String password) {
        return compteRepository.findByUsernameAndPassword(username, password);
    }

    @Override
    public Compte create(Compte compte) {
        return compteRepository.save(compte);
    }

    @Override
    public List<Compte> getAll() {
        return compteRepository.findAll();
    }

    @Override
    public Compte update(Compte compte) {
        return null;
    }
}
