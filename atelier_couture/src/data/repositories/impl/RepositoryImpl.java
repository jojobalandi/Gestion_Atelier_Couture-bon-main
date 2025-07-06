package data.repositories.impl;

import data.entites.AbstractEntity;
import data.entites.Compte;
import data.repositories.Repository;

import java.util.ArrayList;
import java.util.List;

public class RepositoryImpl<T extends AbstractEntity> implements Repository<T> {
    private final List<T> data =  new ArrayList<>();

    @Override
    public T save(T entity) {
        entity.setId(data.size() + 1);
        data.add(entity);
        return entity;
    }

    @Override
    public List<T> findAll() {
        return data;
    }
}
