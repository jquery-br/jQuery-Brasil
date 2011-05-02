<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wp_jquerybrasil');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'ruan');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(rLx_|Q}*/)6)(w%dgg^YH30kCek[vVZzyIO%Szxrq>X%A8q]1/}G6Uapn}iqZc~');
define('SECURE_AUTH_KEY',  ',p)k 2:J?qS ?S8DE^_zz>Pio(f*&sv4e8,n?|bI:|5_m)qNub5 <D|Sj 8<ccN)');
define('LOGGED_IN_KEY',    'TY%9l<(ai~RdXU`ejC_ct#*#x?5F*raImESX[!bl*PbMTB,w^3|{fCG{,K&Cl+7Q');
define('NONCE_KEY',        's8B33[e2N3zmn/yX2QSOQ=t|l^5>$Ol!-|j=A#wfS&Z1)#lP>02_Iy!Xss+vH?i%');
define('AUTH_SALT',        'h8ILv>C588&7v#,s$pWDxO1p1<IPuBF|YSlPmq.r61VBo*(biy%;]z`V9V6!?0_L');
define('SECURE_AUTH_SALT', 'g2P?zdZvJC/uEkd8g2KO#i?|22YA|}j5ChthICt%9EOxdD;BLU}wb{UC}~ gwLL;');
define('LOGGED_IN_SALT',   '_,TT|IOl|5K;^ogsqO(Jm/#O(r[1:PKi>#A=~ u`0X>;8Ju;}QDcS*Mj`]>dR0dC');
define('NONCE_SALT',       ']3v_P0$2^1|2zoJJp(P=s@AZK-}HT(|6ne1VxQ,4K9>hU86.C]#+|?CG?]}JHx=c');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
