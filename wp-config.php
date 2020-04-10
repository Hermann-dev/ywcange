<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
//define( 'DB_NAME', 'b7_25471405_Yeswecange' );
$db = parse_url($_ENV["mysql: // u68drxymu9hg27tr: 5UuYA1l3aPSbhvTPGnU0@brfe41ryhuzpzucxwgy3-mysql.services.clever-cloud.com: 3306 / brfe41ryhuzpzucxwgy3"]);

//define( 'DB_URL', 'http://185.27.134.10/db_structure.php?db=b7_25471405_Yeswecange');
define('DB_NAME', trim($db["brfe41ryhuzpzucxwgy3"],"/"));

/** Utilisateur de la base de données MySQL. */
//define( 'DB_USER', 'b7_25471405' );
efine('DB_USER', $db["u68drxymu9hg27tr"]);

/** Mot de passe de la base de données MySQL. */
//define( 'DB_PASSWORD', 'HermannYaho4978' );
define('DB_PASSWORD', $db["5UuYA1l3aPSbhvTPGnU0"]);

/** Adresse de l’hébergement MySQL. */
//define( 'DB_HOST', 'sql101.byethost7.com' );
define('DB_HOST', $db["brfe41ryhuzpzucxwgy3-mysql.services.clever-cloud.com"]);

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');
define('PORT', '5432');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
//define( 'AUTH_KEY',         '%c%dMz$W67ui(~7uLTJLu{#tXxE3`%r~3a?d>1dAz|Oej#+{.H28@(M=49vD;rr[' );
define('AUTH_KEY', getenv('%c%dMz$W67ui(~7uLTJLu{#tXxE3`%r~3a?d>1dAz|Oej#+{.H28@(M=49vD;rr['));

//define( 'SECURE_AUTH_KEY',  ';=rCb4?.4cw&Rjo)oADHhDY:&#GGrzC!2&!h7{^(ZD99a73b2@^B#wF|ACD[g}y`' );
define('SECURE_AUTH_KEY', getenv(';=rCb4?.4cw&Rjo)oADHhDY:&#GGrzC!2&!h7{^(ZD99a73b2@^B#wF|ACD[g}y`'));

//define( 'LOGGED_IN_KEY',    '84.fM`IBdUSCL%`9QXdG>FW/e4X)W}CUr9*P>>Z-~[1]^tCh#Crk;g-3hd>vc$T6' );
define('LOGGED_IN_KEY', getenv('84.fM`IBdUSCL%`9QXdG>FW/e4X)W}CUr9*P>>Z-~[1]^tCh#Crk;g-3hd>vc$T6'));

//define( 'NONCE_KEY',        '/_z(FfY`uAsQ;rI_VcUaB0<&(*-n}~-A6_99gR)8[X{c$JnT<.bPmpFm#, :L7f?' );
define('NONCE_KEY', getenv('/_z(FfY`uAsQ;rI_VcUaB0<&(*-n}~-A6_99gR)8[X{c$JnT<.bPmpFm#, :L7f?'));

//define( 'AUTH_SALT',        '&QWSEpiO?N?8E*KJ(IkagEP-A[*0>wwoCQ%=CzL!vgjK:0z#>$|_ZSGV9tSTedFk' );
define('AUTH_SALT', getenv('&QWSEpiO?N?8E*KJ(IkagEP-A[*0>wwoCQ%=CzL!vgjK:0z#>$|_ZSGV9tSTedFk'));

//define( 'SECURE_AUTH_SALT', 'm0^HzL{{3G1 B$:mUCL9fj7x]%:#AnzcjtCBF|(FN/9$l0LiciT<Je4$*p`J7m]f' );
define('SECURE_AUTH_SALT', getenv('m0^HzL{{3G1 B$:mUCL9fj7x]%:#AnzcjtCBF|(FN/9$l0LiciT<Je4$*p`J7m]f'));

//define( 'LOGGED_IN_SALT',   ';]i590}Nr].D:siT[In>W7xR,F-@*|QwpmN8731B2y{u9(@0`6bDIMxe7#MY|%%x' );
define('LOGGED_IN_SALT', getenv(';]i590}Nr].D:siT[In>W7xR,F-@*|QwpmN8731B2y{u9(@0`6bDIMxe7#MY|%%x'));

//define( 'NONCE_SALT',       'x6Z}55!~~wAlK11/OyTg $pdhSrhR4gDh{bT[kgtO7S$eg20`gqe009+G$PArgw@' );
define('NONCE_SALT', getenv('x6Z}55!~~wAlK11/OyTg $pdhSrhR4gDh{bT[kgtO7S$eg20`gqe009+G$PArgw@'));

/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'ywc';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
