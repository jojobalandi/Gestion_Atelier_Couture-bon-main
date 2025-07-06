package data.repositories;

import java.util.List;

public interface Repository <T>{
    T save(T entity);
    List<T> findAll();
}
