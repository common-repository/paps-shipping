<?php

if (!defined('ABSPATH')) {
  exit();
}

/*
 * WooCommerce Order Statuses to be used in settings
 */
$delivery_submission_statuses = array_filter(
  wc_get_order_statuses(),
  function ($el) {
    if (in_array($el, ['wc-cancelled', 'wc-refunded', 'wc-failed'])) {
      return false;
    }

    return $el;
  },
  ARRAY_FILTER_USE_KEY
);

$delivery_cancellation_statuses = array_filter(
  wc_get_order_statuses(),
  function ($el) {
    if (in_array($el, ['wc-cancelled', 'wc-refunded', 'wc-failed'])) {
      return $el;
    }

    return false;
  },
  ARRAY_FILTER_USE_KEY
);

/**
 * Array of settings
 */
return array(
  'enabled' => array(
    'title' => __('Expédition avec Paps Standard', 'paps-shipping'),
    'type' => 'checkbox',
    'label' => __('Activé', 'paps-shipping'),
    'default' => 'no'
  ),
  'test' => array(
    'title' => __('Mode Test', 'paps-shipping'),
    'label' => __('Activer le mode Test', 'paps-shipping'),
    'type' => 'checkbox',
    'default' => 'no',
    'desc_tip' => true,
    'description' => __(
      'Activer le mode test pour voir si l\'envoi de courses à Paps se passe sans problème. Notez que la course sera créée mais la prise en charge ne sera pas effectuée',
      'paps-shipping'
    )
  ),
  // 'title' => array(
  //   'title' => __('Titre de la méthode', 'paps-shipping'),
  //   'type' => 'text',
  //   'description' => __(
  //     'Ceci contôle le titre qui s\'affiche durant le check-out',
  //     'paps-shipping'
  //   ),
  //   'default' => __('Forfait', 'paps-shipping'),
  //   'desc_tip' => true
  // ),
  'api_key' => array(
    'title' => __('Clé API', 'paps-shipping'),
    'type' => 'text',
    'description' => __(
      'Le clé API vous a été envoyée dans l\'email de confirmation après l\'avoir obtenue sur https://developers.paps.sn',
      'paps-shipping'
    ),
    'default' => ''
  ),
  'pickup_business_name' => array(
    'title' => __('Nom de l\'entreprise', 'paps-shipping'),
    'type' => 'text',
    'description' => __(
      'Le nom de votre entreprise, où effectuer les ramassages',
      'paps-shipping'
    ),
    'default' => ''
  ),
  'pickup_name' => array(
    'title' => __('Chargé des expéditions', 'paps-shipping'),
    'type' => 'text',
    'description' => __(
      'Nom de la personne en charge des expéditions',
      'paps-shipping'
    ),
    'default' => ''
  ),
  'pickup_address' => array(
    'title' => __('Adresse de Ramassage ou Pickup', 'paps-shipping'),
    'type' => 'text',
    'description' => __(
      'Adresse de votre entreprise où on effectuera les ramassages des colis à livrer.',
      'paps-shipping'
    ),
    'default' => ''
  ),
  'pickup_phone_number' => array(
    'title' => __('Numéro de téléphone du ramassage', 'paps-shipping'),
    'type' => 'text',
    'description' => __(
      'Peut être Le numéro de téléphone de votre entreprise',
      'paps-shipping'
    ),
    'default' => ''
  ),
  'email_monespace_account' => array(
    'title' => __(
      'Adresse email enregistré sur votre compte Monespace',
      'paps-shipping'
    ),
    'type' => 'text',
    'description' => __(
      'Optionnel, Renseignez ce champs si vous souhaitez suivre les commandes votre compte sur votre espace client, Monespace',
      'paps-shipping'
    ),
    'default' => ''
  ),
  // 'is_packs_enabled' => array(
  //   'title' => __('Courses avec Packs achetés', 'paps-shipping'),
  //   'type' => 'checkbox',
  //   'label' => __('Activé', ' '),
  //   'desc_tip' => true,
  //   'description' => __(
  //     'Lorsque activée, cette option permet aux client de pouvoir choisir lui-même le mode de livraison Express ou Programmé (Standard) avec une tarification fixe. Note: vous devez forcément acheter un pack auprès du service commercial.',
  //     'paps-shipping'
  //   ),
  //   'default' => 'no'
  // ),
  'delivery_submission' => array(
    'title' => __(
      'Envoyer la requête à Paps quand la commande à l\'état suivant:',
      'paps-shipping'
    ),
    'type' => 'select',
    'description' => __(
      'Quand la commande est mise dans cet état, la requête est envoyée immédiatement à Paps',
      'paps-shipping'
    ),
    'default' => '',
    'options' => array(
      'pending' => _x('Payement en attente', 'paps-shipping'),
      'processing' => _x('En cours', 'paps-shipping'),
      'on-hold' => _x('En pause', 'paps-shipping'),
      'completed' => _x('Terminé', 'paps-shipping')
    ),
    'desc_tip' => true
  ),
  'delivery_cancellation' => array(
    'title' => __(
      'Annuler la requête à Paps quand la commande est à l\'état suivant:',
      'paps-shipping'
    ),
    'type' => 'select',
    'description' => __(
      'Quand la commande est mise dans cet état, la requête est annulée immédiatement à Paps',
      'paps-shipping'
    ),
    'default' => '',
    'options' => array(
      'cancelled' => _x('Annulé', 'paps-shipping'),
      'failed' => _x('Echec', 'paps-shipping')
    ),
    'desc_tip' => true
  ),
  'pickup_notes' => array(
    'title' => __('Notes sur le ramassage', 'paps-shipping'),
    'type' => 'text',
    'description' => __(
      'Notes par défaut à fournir pour le coursier qui effectue le ramassage',
      'paps-shipping'
    ),
    'default' => ''
  ),
  'debug' => array(
    'title' => __('Mode Debug', 'paps-shipping'),
    'label' => __('Activer le mode debug', 'paps-shipping'),
    'type' => 'checkbox',
    'default' => 'no',
    'desc_tip' => true,
    'description' => __(
      'Activer le mode debug pour montrer les informations de debugging sur la carte checkout.',
      'paps-shipping'
    )
  ),
  'notify_admin_on_failure' => array(
    'title' => __(
      'Envoyer un email à l\'admin lorqu\'il y a un erreur',
      'paps-shipping'
    ),
    'label' => __('Activé', 'paps-shipping'),
    'type' => 'checkbox',
    'default' => 'no',
    'description' => __(
      'Envoyer un email à l\'admin du site lorqu\'il y a un erreur de traitement',
      'paps-shipping'
    )
  ),
  'logging_enabled' => array(
    'title' => __('Activer le logging', 'paps-shipping'),
    'type' => 'checkbox',
    'default' => 'no',
    'desc_tip' => true,
    'description' => __(
      'Activer le logging pour loger les actions de de lintégration de Paps dans le dossier wc-logs',
      'paps-shipping'
    )
  )
);
