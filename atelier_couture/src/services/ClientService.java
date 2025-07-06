package services;

import data.entites.Client;

import java.util.List;

public interface ClientService {
    Client create(Client client);
    List<Client> getAll();
}
