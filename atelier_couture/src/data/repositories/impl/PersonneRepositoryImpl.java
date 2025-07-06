package data.repositories.impl;

import data.entites.Personne;
import data.repositories.PersonneRepository;

import java.util.ArrayList;
import java.util.List;

public class PersonneRepositoryImpl  implements PersonneRepository {
    private static final List<Personne> personnes =  new ArrayList<Personne>();

    @Override
    public Personne save(Personne personne) {
        personne.setId(personnes.size() + 1);
        personnes.add(personne);
        return personne;
    }

    @Override
    public List<Personne> findAll() {
        return personnes;
    }

    @Override
    public void saveAll(List<Personne> personnes) {
        for (Personne personne : personnes) {
            save(personne);
        }
    }
}
