package data.entites;

public class Approvisionnement extends AbstractEntity{

    private Fournisseur fournisseur;
    private ArticleConfection articleConfection;
    private int qteStock;
    private int montActuelStock;

    public Fournisseur getFournisseur() {
        return fournisseur;
    }

    public void setFournisseur(Fournisseur fournisseur) {
        this.fournisseur = fournisseur;
    }



    public int getQteStock() {
        return qteStock;
    }

    public void setQteStock(int qteStock) {
        this.qteStock = qteStock;
    }

    public int getMontActuelStock() {
        return montActuelStock;
    }

    public void setMontActuelStock(int montActuelStock) {
        this.montActuelStock = montActuelStock;
    }

    @Override
    public String toString() {
        return "Approvisionnement{" +
                "id=" + id +
                ", montActuelStock=" + montActuelStock +
                ", qteStock=" + qteStock +
                ", categorie=" + articleConfection +
                ", fournisseur=" + fournisseur.getNom() +
                '}';
    }


    public void setArticleConfection(ArticleConfection articleConfection) {
        this.articleConfection = articleConfection;
    }
}
