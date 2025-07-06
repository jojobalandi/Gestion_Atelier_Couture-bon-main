package data.entites;

public class ArticleVente extends Article{

    private int prixVente;
    private int montVente;
    public ArticleVente() {}

    public int getPrixVente() {
        return prixVente;
    }

    public void setPrixVente(int prixVente) {
        this.prixVente = prixVente;
    }

    public int getMontVente() {
        return montVente;
    }

    public void setMontVente(int montVente) {
        this.montVente = montVente;
    }

    @Override
    public String toString() {
        return "ArticleVente{" +
                "id=" + id +
                ", categorie=" + categorie +
                ", photo='" + photo + '\'' +
                ", qteStock=" + qteStock +
                ", libelle='" + libelle + '\'' +
                ", montVente=" + montVente +
                ", prixVente=" + prixVente +
                '}';
    }
}
