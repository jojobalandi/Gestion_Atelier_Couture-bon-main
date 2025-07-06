package data.entites;

public class Vente extends AbstractEntity{

    private Client client;
    private ArticleVente articleVente;
    private int qteVendue;
    private int montantVente;//calculer
    private int prixUnitaire;//a prendre


    public Client getClient() {
        return client;
    }

    public void setClient(Client client) {
        this.client = client;
    }

    public ArticleVente getArticleVente() {
        return articleVente;
    }

    public void setArticleVente(ArticleVente articleVente) {
        this.articleVente = articleVente;
    }

    public int getQteVendue() {
        return qteVendue;
    }

    public void setQteVendue(int qteVendue) {
        this.qteVendue = qteVendue;
    }

    public int getMontantVente() {
        return montantVente;
    }

    public void setMontantVente(int montantVente) {
        this.montantVente = montantVente;
    }

    public int getPrixUnitaire() {
        return prixUnitaire;
    }

    public void setPrixUnitaire(int prixUnitaire) {
        this.prixUnitaire = prixUnitaire;
    }
}
