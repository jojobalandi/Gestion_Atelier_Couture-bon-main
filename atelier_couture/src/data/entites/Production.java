package data.entites;

import vues.AbstractView;

public class Production extends AbstractView {
    private int id;
    private String observations;
    private ArticleVente articleVente;
    private int qteProduit;

    public String getObservations() {
        return observations;
    }

    public void setObservations(String observations) {
        this.observations = observations;
    }

    public ArticleVente getArticleVente() {
        return articleVente;
    }

    public void setArticleVente(ArticleVente articleVente) {
        this.articleVente = articleVente;
    }

    public int getQteProduit() {
        return qteProduit;
    }

    public void setQteProduit(int qteProduit) {
        this.qteProduit = qteProduit;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
}
