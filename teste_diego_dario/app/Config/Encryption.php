<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Encryption configuration.
 *
 * These are the settings used for encryption, if you don't pass a parameter
 * array to the encrypter for creation/initialization.
 */
class Encryption extends BaseConfig
{
	/*
	  |--------------------------------------------------------------------------
	  | Encryption Key Starter
	  |--------------------------------------------------------------------------
	  |
	  | If you use the Encryption class you must set an encryption key (seed).
	  | You need to ensure it is long enough for the cipher and mode you plan to use.
	  | See the user guide for more info.
	 */

	public $key = 'AXvsbDgV2KPBBnFDj13AiYYC04kuQEZVWleCP6P7cMqfkSknf75+XOR8wGijU5iZLfDWKpwpgNtvEgP61NV1XsQA1+fljKihH/pvxsazkM4YgJen2J3ZsfUZnz4sGUjAZPVtTUSc1nwRJWAmBL3Eu05iYXvLzdwbDSzqAYTGVT5Y8qrUUrSR0uQ/xCS6zJ7XkWelNCm/9R4xXBUGVebxGMCNOoUX5n2nTUU+WVl4vR1VYcWRU5/yyb5NqtGb6tq+MGa329j7ANYEFsPVsmFyDgcM0Rlarg7odpURREb80vaTsdBvWK5WGBJHp12hB1XHhb8jvMKuAOpcZ08XNFTIg==';

	/*
	  |--------------------------------------------------------------------------
	  | Encryption driver to use
	  |--------------------------------------------------------------------------
	  |
	  | One of the supported drivers, eg 'OpenSSL' or 'Sodium'.
	  | The default driver, if you don't specify one, is 'OpenSSL'.
	 */
	public $driver = 'OpenSSL';

}
