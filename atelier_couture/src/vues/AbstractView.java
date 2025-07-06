package vues;

import java.util.Scanner;

public abstract class AbstractView {
    protected static Scanner scanner;

    public static void setScanner(Scanner scanner) {
        AbstractView.scanner = scanner;
    }
}
