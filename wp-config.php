<?php
/**
 * Grundeinstellungen für WordPress
 *
 * Zu diesen Einstellungen gehören:
 *
 * * MySQL-Zugangsdaten,
 * * Tabellenpräfix,
 * * Sicherheitsschlüssel
 * * und ABSPATH.
 *
 * Mehr Informationen zur wp-config.php gibt es auf der
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Zugangsdaten für die MySQL-Datenbank
 * bekommst du von deinem Webhoster.
 *
 * Diese Datei wird zur Erstellung der wp-config.php verwendet.
 * Du musst aber dafür nicht das Installationsskript verwenden.
 * Stattdessen kannst du auch diese Datei als wp-config.php mit
 * deinen Zugangsdaten für die Datenbank abspeichern.
 *
 * @package WordPress
 */

// ** MySQL-Einstellungen ** //
/**   Diese Zugangsdaten bekommst du von deinem Webhoster. **/

/**
 * Ersetze datenbankname_hier_einfuegen
 * mit dem Namen der Datenbank, die du verwenden möchtest.
 */
define('DB_NAME', 'wordpress_dev_2017');

/**
 * Ersetze benutzername_hier_einfuegen
 * mit deinem MySQL-Datenbank-Benutzernamen.
 */
define('DB_USER', 'wordpress_dev');

/**
 * Ersetze passwort_hier_einfuegen mit deinem MySQL-Passwort.
 */
define('DB_PASSWORD', 'zDxh481#');

/**
 * Ersetze localhost mit der MySQL-Serveradresse.
 */
define('DB_HOST', '176.28.51.76');

/**
 * Der Datenbankzeichensatz, der beim Erstellen der
 * Datenbanktabellen verwendet werden soll
 */
define('DB_CHARSET', 'utf8mb4');

/**
 * Der Collate-Type sollte nicht geändert werden.
 */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden untenstehenden Platzhaltertext in eine beliebige,
 * möglichst einmalig genutzte Zeichenkette.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle Schlüssel generieren lassen.
 * Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten
 * Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{A>-0cbkwGN#DA9cMT{5J7>`]TrBsJojn!enSs[o$R]JUU2{2o$[#uQ2)?mB.gdA');
define('SECURE_AUTH_KEY',  'fJ)]+EN>Q,?05=@46`mGS$o^n*I^<? ~P(tRceg=X/%V3da6Kwe]|#qK`h5S2e$L');
define('LOGGED_IN_KEY',    'F%S7l*5P(u K6J97{(<h>6U7Jsahnv1(/)4Tpb?.KQ~}7K<v&cS22an4X($2@-z9');
define('NONCE_KEY',        '4kB ~ku03TO&:e<ndjSsdCXd$peYiiNqvNeE!^TQM^Nt i3.Lyxz#sA `Hcpgb&g');
define('AUTH_SALT',        'iZo%ke2F0k!OH!v#W.r8OjAC(F)y|`9(VO0g,21bhC}q@+656;1/kzSg*Ar,>*I3');
define('SECURE_AUTH_SALT', 'IuNzLQu@*+-i3X9aX*oQ%qb77sRTqtDyX[#t_yLtDo`dED$-VXbzn3R{mbP(PnbP');
define('LOGGED_IN_SALT',   't#M^}[U>JGt%THmYd`MtdQ!E*:m-Ew;Q[Ednw&L11T06o=vf&Bpy/Vo!e~WzACtx');
define('NONCE_SALT',       'T[!Q5t7s Rb3UQF[vb&io-=LAA|TwnW!fy6F,5wTCUStMY3uRH-mr_zC]P)NH$ 1');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben.
 * Bitte verwende nur Zahlen, Buchstaben und Unterstriche!
 */
$table_prefix  = 'wp_dev_';

/**
 * Für Entwickler: Der WordPress-Debug-Modus.
 *
 * Setze den Wert auf „true“, um bei der Entwicklung Warnungen und Fehler-Meldungen angezeigt zu bekommen.
 * Plugin- und Theme-Entwicklern wird nachdrücklich empfohlen, WP_DEBUG
 * in ihrer Entwicklungsumgebung zu verwenden.
 *
 * Besuche den Codex, um mehr Informationen über andere Konstanten zu finden,
 * die zum Debuggen genutzt werden können.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

//define('FS_METHOD', 'direct');

/* Das war’s, Schluss mit dem Bearbeiten! Viel Spaß beim Bloggen. */
/* That's all, stop editing! Happy blogging. */

/** Der absolute Pfad zum WordPress-Verzeichnis. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Definiert WordPress-Variablen und fügt Dateien ein.  */
require_once(ABSPATH . 'wp-settings.php');
