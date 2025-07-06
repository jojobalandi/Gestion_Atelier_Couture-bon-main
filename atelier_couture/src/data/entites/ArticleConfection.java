package data.entites;

public class ArticleConfection extends Article{

    private int prixAchat;
    private int qteAchat;
    private int montStock;
    public ArticleConfection() {}


    public int getPrixAchat() {
        return prixAchat;
    }

    public void setPrixAchat(int prixAchat) {
        this.prixAchat = prixAchat;
    }

    public int getQteAchat() {
        return qteAchat;
    }

    public void setQteAchat(int qteAchat) {
        this.qteAchat = qteAchat;
    }

    public int getMontStock() {
        return montStock;
    }

    public void setMontStock(int montStock) {
        this.montStock = montStock;
    }

    @Override
    public String toString() {
        return "ArticleConfection{" +
                "id=" + id +
                ", categorie=" + categorie +
                ", photo='" + photo + '\'' +
                ", qteStock=" + qteStock +
                ", libelle='" + libelle + '\'' +
                ", montStock=" + montStock +
                ", qteAchat=" + qteAchat +
                ", prixAchat=" + prixAchat +
                '}';
    }
}
