package data.repositories;

import data.entites.Personne;

import java.util.List;

public interface PersonneRepository {
    Personne save(Personne personne);
    void saveAll(List<Personne> personnes);
    List<Personne> findAll();
}
