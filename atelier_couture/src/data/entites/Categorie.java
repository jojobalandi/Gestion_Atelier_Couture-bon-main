package data.entites;

public class Categorie extends  AbstractEntity {

    private String libelle;

    public String getLibelle() {
        return libelle;
    }

    public void setLibelle(String libelle) {
        this.libelle = libelle;
    }

    @Override
    public String toString() {
        return "Categorie{" +
                "libelle='" + libelle + '\'' +
                ", id=" + id +
                '}';
    }
}
