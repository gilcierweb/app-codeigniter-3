<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

function criarMigration($nomeMigration)
{
	$nomeArquivo = date('YmdHis') . '_' . $nomeMigration . '.php';
	$caminhoArquivo = 'application/migrations/' . $nomeArquivo;

	$conteudo = '<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

class Migration_' . ucfirst(str_replace(' ', '_', $nomeMigration)) . ' extends CI_Migration {

    public function up() {
        // Código para aplicar a migration
    }

    public function down() {
        // Código para reverter a migration
    }
}
';

	if (file_put_contents($caminhoArquivo, $conteudo)) {
		echo "Arquivo de migration criado: $nomeArquivo\n";
	} else {
		echo "Erro ao criar arquivo de migration\n";
	}
}

if ($argc < 2) {
	echo "Use: php migration.php <nome_da_migration>\n";
	exit(1);
}

$nomeMigration = str_replace(' ', '_', strtolower($argv[1]));
criarMigration($nomeMigration);
