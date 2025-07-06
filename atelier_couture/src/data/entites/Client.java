package data.entites;

import java.util.List;

public class Client extends Personne{

    private String observation;
    private List<Vente> ventes;

    public Client(String nom,String prenom,String telephone,String adresse){
        super(nom,prenom,telephone,adresse);
    }

    public Client (){}

    public String getObservation() {
        return observation;
    }

    public void setObservation(String observation) {
        this.observation = observation;
    }




    @Override
    public String toString() {
        return "Client{" +
                "id=" + id +
                ", ventes=" + ventes +
                ", observation='" + observation + '\'' +
                '}';
    }

    public void setVentes(List<Vente> ventes) {
        this.ventes = ventes;
    }
}
