package data.entites;

public class Fournisseur extends Personne{

    private String telFixe;

    public Fournisseur() {}
    public Fournisseur(String nom,String prenom,String telephone,String adresse){
        super(nom,prenom,telephone,adresse);
    }

    public String getTelFixe() {
        return telFixe;
    }

    public void setTelFixe(String telFixe) {
        this.telFixe = telFixe;
    }

    @Override
    public String toString() {
        return "Fournisseur{" +
                "id=" + id +
                ", telFixe='" + telFixe + '\'' +
                '}';
    }
}
