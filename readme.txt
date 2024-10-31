=== Paps Shipping ===
Contributors: Paps
Tags: paps, paps-api, livraison, woocommerce shipping, paps shipping
Requires PHP: 7.1
Requires at least: 4.0
Tested up to: 6.6
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

L'intégration de Paps pour WooCommerce vous permet de gérer efficacement et sans effort votre demandes de livraison de colis directement à travers votre admin WordPress.

== Description ==

Important : mettez à jour le plugin (v1.4). Profitez des nouvelles fonctionnalités : suivi des livraisons, tarif unique, prise en charge express et plus.

Plugin Features:

- Le statut de chaque livraison dans la page des commandes.
- Notes personnalisées pour le coursier qui s'occupe du ramassage.
- Statut de la livraison directement chez l'utilisateur avec un lien de suivi.
- Possibilité pour l'admin de prise en charge express des courses.
- Calcul automatique du tarif de la livraison.
- Possibilité de fixer un montant forfaitaire pour toutes les livraisons.
- Envoi d'email à l'admin quand la demande de livraison échoue.
- Etc.

Bientôt disponible:

- Possibilité pour l'utilisateur de choisir lui-même une livraison Standard (Programmé)  ou en Point Relais (au SENEGAL) .
- plus


== Installation ==

Requis:

- Une clé de sécurité de l'API que vous pouvez obtenir en allant visiter sur https://developers.paps.sn et cliquer le bouton "Obtenir une clé" dans la page d'accueil.

-Adresse Email valide (l'adresse où a été envoyer votre clé de sécurité de l'API)

- Adresse de votre entrepôt/warehouse où se trouvent vos colis (Peut être l'adresse de votre entreprise). Vous pouvez mettre l'adresse de notre entrepôt Paps si vous avez choisi de stocker vos produits chez nous.

Optionnel:
- Une signature secrète (seulement si vous souhaitez utiliser les Webhooks) 

== Support ==

Si vous avez une question, veuillez envoyer un email à dev@paps-app.com

== Frequently Asked Questions ==

Visitez la documentation officielle sur https://developers.paps.sn

== Screenshots ==
1. Admin status.
2. Settings.
3. Settings.
4. Settings.
5. Settings.

== Installation ==

= Minimum Requirements =

* WooCommerce 4.9 or later
* WordPress 5.6 or later

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install of WooCommerce, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type “WooCommerce Paps Integration” and click Search Plugins. Once you’ve found the plugin you can view details about it such as the the point release, rating and description. Most importantly of course, you can install it by simply clicking “Install Now”.

= Manual installation =

The manual installation method involves downloading the plugin and uploading it to your webserver via your favourite FTP application. The WordPress codex contains [instructions on how to do this here](https://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

== Changelog ==

=2.0=
Réglage du problème de prix standard, compatibilité avec d'autres extensions.

= 1.3.5 =
Ajout des détails de la livraison dans le corps de l'email. A noter que cela ne prend les liens de tracking que lorque vous déclenchez l'envoi d'email de la facture pour le moment.

= 1.3.1 =

Régler le problème du loader qui se bloque sur la page de checkout de la commande lorsque l'utilisateur change un champ qui déclenche le ajax update. (Argh, ça a duré celui-là .)

= 1.2.1 =

Mise à jour des dépendances qui affichent des erreurs sur l'inteface utilisateur

= 1.2.0 =
- Prise en charge automatique des courses Express ou Standard (programmé)- Possibilité de fixer un montant forfaitaire pour toutes les courses,  - Méthode de livraison supporté automatiquement avec Paps Express ou Paps Standard
- Calcul automatique des tarifs de livraison, mise à jour en temps réél d'une course sur l'espace Admin et utilisateur et plus.

= 1.0.0 =
Release of the first version


== Code source lisible par l'homme ==

Conformément aux directives de WordPress, vous pouvez accéder à la version lisible par l'homme de notre code source aux liens suivants :

- [Fichier principal PHP](https://github.com/paps-app/paps-shipping/blob/main/paps-shipping.php)
- [Fichier API pour la gestion des livraisons](https://github.com/paps-app/paps-shipping/blob/main/includes/api/class-paps-api.php)
- [Fichier de configuration](https://github.com/paps-app/paps-shipping/blob/main/includes/shipping/data-paps-settings-standard.php)

Pour plus d'informations, consultez notre dépôt GitHub complet : [Voir sur GitHub](https://github.com/paps-app/paps-shipping).


== Upgrade Notice ==
Prière de mettre à jour le plugin en version 2.0 pour bénéficier des améliorations : support Paps Standard, calcul auto des tarifs, suivi en temps réel, et plus.

1. Activer/désactiver les courses express (WooCommerce > Réglages > Expédition > Paps).
2. Configurer Paps Standard.
3. Fixer un montant forfaitaire (optionnel).
4. Enjoy 😎
