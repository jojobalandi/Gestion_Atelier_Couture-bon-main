package data.entites;

public class Article extends AbstractEntity {
    protected String libelle;
    protected int qteStock;
    protected String photo;
    protected Categorie categorie;

    public String getLibelle() {
        return libelle;
    }

    public void setLibelle(String libelle) {
        this.libelle = libelle;
    }

    public int getQteStock() {
        return qteStock;
    }

    public void setQteStock(int qteStock) {
        this.qteStock = qteStock;
    }

    public String getPhoto() {
        return photo;
    }

    public void setPhoto(String photo) {
        this.photo = photo;
    }

    public Categorie getCategorie() {return categorie;}

    public void setCategorie(Categorie categorie) {this.categorie = categorie;}

    @Override
    public String toString() {
        return "Article{" +
                "libelle='" + libelle + '\'' +
                ", qteStock=" + qteStock +
                ", photo='" + photo + '\'' +
                '}';
    }
}
