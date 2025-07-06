package services;


import data.entites.Vente;

import java.util.List;

public interface VenteService {
    Vente create(Vente vente);
    List<Vente> getAll();

}
