<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web,è anche possibile copiare questo file in "wp-config.php" e
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'pubblicitario_db');

/** Nome utente del database MySQL */
define('DB_USER', 'root');

/** Password del database MySQL */
define('DB_PASSWORD', 'root');

/** Hostname MySQL  */
define('DB_HOST', 'localhost');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * E' possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',1:_SEw&VGY7(E?d$rFWMI0A31f/x+V*C?[NbVquix!x=3H+exX 0bWvYL,swEWp');
define('SECURE_AUTH_KEY',  '<0p{PD<_w>m{CCV1u0s:DA#B8=RsPc2?tpp3cv{4 t3W.r7J;,^ w(;r4MlaYZVT');
define('LOGGED_IN_KEY',    '/ErWP([QZ3(=|chN:a5n =s{8VEv{XG,|q1%<*))rtJy&A;r(z_s26[/<(l-c?Oo');
define('NONCE_KEY',        'X|Ljtr|9nAgwJOe(ZX+pjOVjP,U;7?6>(+)(9!~w1;n>}iYqZJDv=Ex8iB$$CSJE');
define('AUTH_SALT',        'fw3x&itNu!3`^6_bF*>N5g_<>4KJ dr^`=AC Su=054)-~5:-QQ7(jcz$oT%1.Tp');
define('SECURE_AUTH_SALT', '/68A:@B(Ecb%N0VD/fAm7>+=N{GnV7ZoAaR}ZOBa{(8EBv-yG=5s@+XYUu2LLmjn');
define('LOGGED_IN_SALT',   'gW=e1}ikJfp^n({#P+[Fu}++@W#G-ruji?=[^)!W_y&4$xPN1HTFr/^An$_[FqS:');
define('NONCE_SALT',       '%7q^P}6~/qwm*rLoGpya0jA`}nTf_Py@(:+s-;=<$gYw^4|R;H&Rq*bzG%#uE:&J');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'msgm_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
