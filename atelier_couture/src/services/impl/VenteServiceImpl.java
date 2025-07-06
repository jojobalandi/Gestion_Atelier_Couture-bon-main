package services.impl;

import data.entites.Vente;
import data.repositories.VenteRepository;
import data.repositories.impl.VenteRepositoryImpl;
import services.VenteService;

import java.util.List;

public class VenteServiceImpl implements VenteService {

    private final VenteRepository venteRepository;

    public VenteServiceImpl(VenteRepository venteRepository) {
        this.venteRepository = venteRepository;
    }

    @Override
    public Vente create(Vente vente) {
        return venteRepository.save(vente);
    }

    @Override
    public List<Vente> getAll() {
        return venteRepository.findAll();
    }
}
