<?php

$erreurs = $_SESSION['erreurs'] ?? [];
$data = $_SESSION['data'] ?? [];
unset($_SESSION['erreurs']);
unset($_SESSION['data']);


$users = $users ?? [];
?>

<div class="login-main-content">
    <div class="FormConnexion">
        <div class="logoConexion">
            <img src="/public/images/gestCout.png" alt="Logo">
        </div>

        <form class="FormOfConexion" action="/public/index.php" method="post">
            <input type="hidden" name="controller" value="security">
            <input type="hidden" name="action" value="login">

            <h4>Connectez‑vous</h4>

            <?php if (!empty($erreurs['connexion'])): ?>
                <small class="form-text text-danger error-message">
                    <?= htmlspecialchars($erreurs['connexion']) ?>
                </small>
            <?php endif; ?>

            <div class="NormalConnexion">
                <label for="login">Nom d'utilisateur</label>
                <?php if (!empty($erreurs['login'])): ?>
                    <small class="form-text text-danger error-message">
                        <?= htmlspecialchars($erreurs['login']) ?>
                    </small>
                <?php endif; ?>
                <input type="text" id="login" name="login" placeholder="Nom d'utilisateur" required
                       value="<?= htmlspecialchars($data['login'] ?? '') ?>">

                <label for="password">Mot de passe</label>
                <?php if (!empty($erreurs['password'])): ?>
                    <small class="form-text text-danger error-message">
                        <?= htmlspecialchars($erreurs['password']) ?>
                    </small>
                <?php endif; ?>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>

                <label for="role">Rôle</label>
                <?php if (!empty($erreurs['role'])): ?>
                    <small class="form-text text-danger error-message">
                        <?= htmlspecialchars($erreurs['role']) ?>
                    </small>
                <?php endif; ?>
                <select id="role" name="role" required>
                    <option value="">Sélectionnez votre rôle</option>
                    <option value="Gestionnaire" <?= (isset($data['role']) && $data['role'] == 'Gestionnaire') ? 'selected' : '' ?>>Gestionnaire</option>
                    <option value="Responsable Stock" <?= (isset($data['role']) && $data['role'] == 'Responsable Stock') ? 'selected' : '' ?>>Responsable Stock</option>
                    <option value="Responsable Production" <?= (isset($data['role']) && $data['role'] == 'Responsable Production') ? 'selected' : '' ?>>Responsable Production</option>
                    <option value="Vendeur" <?= (isset($data['role']) && $data['role'] == 'Vendeur') ? 'selected' : '' ?>>Vendeur</option>
                </select>
            </div>

            <button type="submit" class="connexion-btn">Connexion</button>
        </form>
    </div>

    <div class="TestCredentials">
        <h4>Comptes à definir :</h4>
        <ul>
            <li>
                <strong>Rôle:</strong> Gestionnaire<br>
                <strong>Login:</strong> `admin`<br>
                <strong>Mot de passe:</strong> `pass123`
            </li>
            <li>
                <strong>Rôle:</strong> Responsable Stock<br>
                <strong>Login:</strong> `stock`<br>
                <strong>Mot de passe:</strong> `stock123`
            </li>
            <li>
                <strong>Rôle:</strong> Responsable Production<br>
                <strong>Login:</strong> `production`<br>
                <strong>Mot de passe:</strong> `prod123`
            </li>
            <li>
                <strong>Rôle:</strong> Vendeur<br>
                <strong>Login:</strong> `vendeur`<br>
                <strong>Mot de passe:</strong> `vend123`
            </li>
        </ul>

    </div>
</div>